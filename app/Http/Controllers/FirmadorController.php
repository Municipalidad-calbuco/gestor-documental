<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Firmador;
use App\Models\Proceso;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Firebase\JWT\JWT;
use DateTimeZone;
use DateTime;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile as Google_Service_Drive_DriveFile;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;


class FirmadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener la lista de visadores

    }
    public function visadoresfirma($id)
    {
        $users = User::all();

        $archivo = Archivo::where('id_proceso', $id)->first();

        // Obtener la lista de visadores
        $visadores = DB::table('users')
            ->select('users.name', 'users.rut', 'visadors.id')
            ->join('visadors', 'visadors.id_usuario', '=', 'users.id')
            ->whereIn('visadors.id_archivo', $archivo)
            ->get();
        return view('partes.firmas', ['users' => $users, 'archivo' => $archivo, 'visadores' => $visadores]);
    }
    public function detalle($id)
    {
        return view('firmas.firmar');
    }
    /**
     * Show the form for creating a new resource.
     */

    public function procesarFirmaGoogleDrive($fileId, $otp, $nombre, $cargo, $rut)
    {
        try {
            // Configuración de Google Drive
            $client = new Google_Client();
            $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
            $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

            $driveService = new Google_Service_Drive($client);

            // Descargar el archivo de Google Drive
            $response = $driveService->files->get($fileId, ['alt' => 'media']);
            $pdfContent = $response->getBody()->getContents();

            if (empty($pdfContent)) {
                throw new \Exception("No se pudo descargar el contenido del archivo de Google Drive.");
            }

            // Preparar el PDF con la firma
            $pdfConFirma = $this->prepararPDFConFirma($pdfContent, $nombre, $cargo, $rut);

            // Lógica de firma (usando la API externa)
            $documentoFirmado = $this->firmarConAPI($pdfConFirma, $otp);

            if ($documentoFirmado) {
                // Actualizar el archivo en Google Drive
                $file = new Google_Service_Drive_DriveFile();
                $driveService->files->update($fileId, $file, [
                    'data' => $documentoFirmado,
                    'mimeType' => 'application/pdf',
                    'uploadType' => 'multipart'
                ]);

                return ['success' => true];
            } else {
                return ['success' => false, 'error' => 'No se pudo firmar el documento'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    private function firmarConAPI($pdfContent, $otp)
    {
        // Configuración
        $apiUrl = 'https://api.firma.cert.digital.gob.cl/firma/v2/files/tickets';
        $apiTokenKey = '527e1f35-7522-4f8a-9990-bdaf82bd9b44';
        $secret = '1c90c59c07a547fd85b7f08e8a518cfd';

        // Crear el JWT
        $payload = [
            'entity' => 'Ilustre Municipalidad de Calbuco',
            'run' => '19175756',
            'expiration' => (new DateTime('now', new DateTimeZone('America/Santiago')))->modify('+25 minutes')->format('Y-m-d\TH:i:s'),
            'purpose' => 'Propósito General',
        ];
        $jwt = JWT::encode($payload, $secret, 'HS256');

        // Preparar el cuerpo de la solicitud
        $body = [
            'api_token_key' => $apiTokenKey,
            'token' => $jwt,
            'files' => [
                [
                    'content-type' => 'application/pdf',
                    'content' => base64_encode($pdfContent),
                    'description' => 'Documento a firmar',
                    'checksum' => hash('sha256', $pdfContent)
                ]
            ]
        ];

        // Realizar la solicitud a la API
        $client = new Client();
        $response = $client->post($apiUrl, [
            'json' => $body,
            'headers' => [
                'otp' => $otp,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        if (isset($result['files'][0]['content']) && $result['files'][0]['status'] === 'OK') {
            return base64_decode($result['files'][0]['content']);
        }

        return null;
    }


    private function prepararPDFConFirma($pdfContent, $nombre, $cargo, $rut)
    {
        $pdf = new Fpdi();

        // Usar un archivo temporal para el contenido del PDF
        $tempFile = tmpfile();
        fwrite($tempFile, $pdfContent);
        $tempFilePath = stream_get_meta_data($tempFile)['uri'];

        $pageCount = $pdf->setSourceFile($tempFilePath);

        // Obtener el tamaño de la primera página
        $tplIdx = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tplIdx);
        $pageWidth = $size['width'];
        $pageHeight = $size['height'];
        $pageOrientation = $size['orientation'];

        // Copiar todas las páginas del documento original
        for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
            $tplIdx = $pdf->importPage($pageNumber);
            $pdf->AddPage($pageOrientation, [$pageWidth, $pageHeight]);
            $pdf->useTemplate($tplIdx, 0, 0, $pageWidth, $pageHeight);
        }

        // Agregar una nueva página para las firmas con el mismo tamaño que la primera página
        $pdf->AddPage($pageOrientation, [$pageWidth, $pageHeight]);

        // Configuración de la firma (manteniendo los valores originales)
        $margenIzquierdo = 20;
        $margenSuperior = 20;
        $anchoFirma = min(40, $pageWidth - 2 * $margenIzquierdo);
        $altoFirma = min(35, $pageHeight - 2 * $margenSuperior);

        // Agregar título centrado a la página de firmas
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->SetY($margenSuperior);
        $pdf->Cell($pageWidth, 10, 'Pagina de Firmas', 0, 1, 'C');

        // Posición para la firma (manteniendo los valores originales)
        $posX = $margenIzquierdo;
        $posY = $margenSuperior + 20;

        // Agregar la imagen del timbre (manteniendo la configuración original)
        $timbrePath = storage_path('app/signature.png');
        if (file_exists($timbrePath)) {
            $pdf->Image($timbrePath, $posX, $posY, $anchoFirma, $altoFirma);
        } else {
            $pdf->SetFont('Helvetica', 'B', 12);
            $pdf->SetTextColor(255, 0, 0);
            $pdf->Text($posX, $posY, 'Imagen de timbre no encontrada');
        }

        // Agregar el nombre y cargo debajo de la imagen
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // Nombre
        $pdf->SetXY($posX, $posY + $altoFirma + 5);
        $pdf->Cell($anchoFirma, 6, $nombre, 0, 1, 'C');

        // Cargo
        $pdf->SetX($posX);
        $pdf->Cell($anchoFirma, 6, $cargo, 0, 1, 'C');

        // RUT
        $pdf->SetX($posX);
        $pdf->Cell($anchoFirma, 6, $rut, 0, 1, 'C');
        $output = $pdf->Output('S');

        // Cerrar y eliminar el archivo temporal
        fclose($tempFile);

        return $output;
    }
    public function descargarDocumento($fileName)
    {
        $path = Storage::path('documentos_firmados/' . $fileName);
        return response()->download($path, $fileName);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Firmador $firmador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firmador $firmador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firmador $firmador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firmador $firmador)
    {
        //
    }
}
