<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Http\Controllers\FirmadorController;
use App\Models\Archivo;
use App\Models\Firmador;
use App\Models\Proceso;
use DateTimeZone;
use Illuminate\Support\Facades\Storage;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Illuminate\Support\Facades\DB;
use DateTime;


class FirmarDocumento extends Component
{
    public $id; // ID del proceso
    public $fileId;
    public $otp;
    public $nombre;
    public $isLoading = false;
    public $message = '';
    public $proceso;
    public $archivo;
    public $cargo;
    public $idUsurio;
    public $rut;
    public $archivoid;

    protected $rules = [
        'otp' => 'required|string',
        'nombre' => 'required|string',
    ];

    public function mount($id)
    {
        $this->id = $id;
        $this->nombre = auth()->user()->name;
        $this->idUsurio = auth()->id();
        $this->rut = auth()->user()->rut;
        $this->archivoid = Archivo::where('id_proceso', $id)->value('id');


        $this->loadProcessAndFile();
        $this->cargo =  DB::table('procesos')
            ->select('cargos.nombre_cargo')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('firmadors', 'firmadors.id_archivo', '=', 'archivos.id')
            ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
            ->where('firmadors.id_usuario',  $this->idUsurio)
            ->value('cargos.nombre_cargo') ?? 'Cargo no especificado';
    }

    private function loadProcessAndFile()
    {
        $this->proceso = Proceso::find($this->id);
        if (!$this->proceso) {
            $this->message = 'Error: No se encontró el proceso.';
            return;
        }

        $this->archivo = Archivo::where('id_proceso', $this->id)->first();
        if (!$this->archivo) {
            $this->message = 'Error: No se encontró un archivo asociado a este proceso.';
            return;
        }

        $this->fileId = $this->archivo->id_google_drive;
        if (!$this->fileId) {
            $this->message = 'Error: No hay un ID de Google Drive asociado a este archivo.';
        }
    }

    public function firmar()
    {
        $this->validate();

        if (!$this->fileId) {
            $this->message = 'Error: No se puede firmar porque no hay un archivo de Google Drive asociado.';
            return;
        }

        $this->isLoading = true;
        $this->message = 'Procesando...';

        try {

            $controller = new FirmadorController();
            $response = $controller->procesarFirmaGoogleDrive($this->fileId, $this->otp, $this->nombre, $this->cargo, $this->rut);
            $chileTimeZone = new DateTimeZone('America/Santiago');



            if ($response['success']) {
                $registro = Firmador::where('id_usuario', $this->idUsurio)
                    ->where('id_archivo', $this->archivoid) // Ahora es solo el id
                    ->first();
                if ($registro) {
                    $registro->update([
                        'estado' => 'Firmado',
                        'fecha_firma' =>  $dateTime = new DateTime('now', $chileTimeZone)
                    ]);
                }
                $this->message = 'Documento firmado exitosamente y actualizado en Google Drive.';
            } else {
                $this->message = 'Error: ' . ($response['error'] ?? 'Ocurrió un error desconocido');
            }
        } catch (\Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
        }

        $this->isLoading = false;
    }



    public function render()
    {
        return view('livewire.firmar-documento');
    }
}
