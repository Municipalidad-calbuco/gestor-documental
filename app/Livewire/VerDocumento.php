<?php

namespace App\Livewire;



use App\Models\Archivo;
use App\Models\Proceso;
use App\Models\Visador;
use Livewire\Component;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile as Google_Service_Drive_DriveFile;
use Google_Service_Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use Google\Service\ServiceControl\Auth;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth as Autuser;

class VerDocumento extends Component
{
    public $proceso;
    public $archivo;
    public $fileId;
    public $mimeType;
    public $error;
    public $dato;
    public $visadores;
    public $userId;



    public function mount($id)
    {
        $this->proceso = Proceso::find($id);
        $this->archivo = Archivo::where('id_proceso', $id)->first();
        $this->userId = auth()->id();

        $this->fileId = DB::table('archivos')
            ->where('id_proceso', $id)
            ->value('id_google_drive');

        if (!$this->fileId) {
            $this->error = 'No se encontró el archivo en Google Drive.';
            return;
        }

        $this->getGoogleDriveFileInfo();
        $this->getProcesoInfo($id);
        $this->getVisadoresInfo($id);
    }

    private function getGoogleDriveFileInfo()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        $service = new Google_Service_Drive($client);

        $fileMetadata = $service->files->get($this->fileId);
        $this->mimeType = $fileMetadata->getMimeType();
    }

    private function getProcesoInfo($id)
    {
        $this->dato = DB::table('procesos')
            ->select('users.name', 'procesos.fecha_inicio', 'oficinas.nombre_oficina', 'procesos.descripcion', 'tipo_documentos.nombre_doc', 'archivos.nombre_archivo')
            ->join('users', 'users.id', '=', 'procesos.id_usuario')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
            ->join('oficinas', 'oficinas.id', '=', 'users.id_oficina')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->where('procesos.id', $id)
            ->get();
    }

    private function getVisadoresInfo($id)
    {
        $this->visadores = DB::table('procesos')
            ->select('visadors.estado', 'visadors.fecha_visacion', 'users.name')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('users', 'users.id', '=', 'visadors.id_usuario')
            ->where('procesos.id', $id)
            ->get();
    }

    public function render()
    {
        return view('livewire.ver-documento');
    }
}
