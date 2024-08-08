<?php

namespace App\Http\Livewire;

use App\Models\Archivo;
use App\Models\Proceso;
use Livewire\Component;

use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile as Google_Service_Drive_DriveFile;
use Google_Service_Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class VerArchivo extends Component
{
   
    public $proceso;
    public $archivo;
    public $fileId;
    public $mimeType;
    public $error;

    public function detalle($id_proceso)
    {
        $this->proceso = Proceso::find($id_proceso);
        $this->archivo = Archivo::where('id_proceso', $id_proceso)->first();
        
        $this->fileId = DB::table('archivos')
                    ->where('id_proceso', $id_proceso)
                    ->value('id_google_drive');

        if (!$this->fileId) {
            $this->error = 'No se encontró el archivo en Google Drive.';
            return;
        }

        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        $service = new Google_Service_Drive($client);

        $fileMetadata = $service->files->get($this->fileId);
        $this->mimeType = $fileMetadata->getMimeType();
    }
    public function render()
    {
        return view('livewire.ver-archivo');
    }
}
