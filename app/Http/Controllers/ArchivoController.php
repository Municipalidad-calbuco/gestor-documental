<?php

namespace App\Http\Controllers;






use Illuminate\Http\Request;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile as Google_Service_Drive_DriveFile;
use Google_Service_Exception;
use App\Models\Archivo;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;


class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    private function getGoogleClient()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        return $client;
    }
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->getRealPath();

            $client = new Google_Client();
            $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
            $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

            $service = new Google_Service_Drive($client);
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $fileName,
                'parents' => [env('GOOGLE_DRIVE_FOLDER_ID')]
            ]);

            $content = file_get_contents($filePath);
            $file = $service->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $file->getMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id'
            ]);


            $driveFile = new Archivo();
            $driveFile->nombre_archivo = $fileName;
            $driveFile->id_google_drive = $file->id;
            $driveFile->tipo_archivo = $file->getMimeType();
            $driveFile->id_proceso = $request->input('id_proceso');
            $driveFile->save();
            return back()->with('success', 'Archivo subido correctamente a Google Drive.');
        }
    }
    public function getFile($fileId)
    {
        // Inicializar Google Client
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        // Inicializar el servicio de Google Drive
        $service = new Google_Service_Drive($client);

        // Obtener metadatos del archivo
        $fileMetadata = $service->files->get($fileId);
        $fileName = $fileMetadata->getName();
        $mimeType = $fileMetadata->getMimeType();

        // Descargar el contenido del archivo
        $response = $service->files->get($fileId, array('alt' => 'media'));
        $content = $response->getBody()->getContents();


        // Crear la respuesta de descarga
        return response($content, 200)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }
    public function viewFile($fileId)
    {
        try {
            // Inicializar Google Client
            $client = new Google_Client();
            $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
            $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

            // Inicializar el servicio de Google Drive
            $service = new Google_Service_Drive($client);

            // Obtener metadatos del archivo
            $fileMetadata = $service->files->get($fileId);
            $mimeType = $fileMetadata->getMimeType();

            // Descargar el contenido del archivo
            $response = $service->files->get($fileId, ['alt' => 'media']);
            $content = $response->getBody()->getContents();

            // Crear la respuesta de visualización
            return response($content, 200)
                ->header('Content-Type', $mimeType);
        } catch (Google_Service_Exception $e) {
            Log::error('Google Drive API error: ' . $e->getMessage());
            return response()->json(['error' => 'Error al descargar el archivo'], 500);
        } catch (Exception $e) {
            Log::error('General error: ' . $e->getMessage());
            return response()->json(['error' => 'Error al descargar el archivo'], 500);
        }
    }

    public function showFile($fileId)
    {
        // Inicializar Google Client
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        // Inicializar el servicio de Google Drive
        $service = new Google_Service_Drive($client);

        // Obtener metadatos del archivo
        $fileMetadata = $service->files->get($fileId);
        $mimeType = $fileMetadata->getMimeType();

        return view('archivo.viewFile', compact('fileId', 'mimeType'));
    }

    public function detalle($id_proceso)
    {
        // Obtener el ID del archivo de Google Drive desde la base de datos
        $fileId = DB::table('archivos')
            ->where('id_proceso', $id_proceso)
            ->value('id_google_drive');

        // Verificar si el ID del archivo es válido
        if (!$fileId) {
            return back()->with('error', 'No se encontró el archivo en Google Drive.');
        }

        // Inicializar Google Client
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        // Inicializar el servicio de Google Drive
        $service = new Google_Service_Drive($client);

        // Obtener metadatos del archivo
        $fileMetadata = $service->files->get($fileId);
        $mimeType = $fileMetadata->getMimeType();

        return view('partes.archivo', [

            'fileId' => $fileId,
            'mimeType' => $mimeType,

        ]);
    }
    public function create()
    {
        //
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
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
}
