<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use App\Models\User;
use App\Models\Visador;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipodocumento = TipoDocumento::pluck('nombre_doc', 'id')->toArray();
        return view('partes.proceso', ['tipodocumento' => $tipodocumento]);
    }

    public function create(Request $request)
    {


        $nuevoProceso = new Proceso();
        $nuevoProceso->descripcion = $request->input('descripcion');
        $nuevoProceso->id_usuario = $request->input('id_usuario');
        $nuevoProceso->id_tipo_doc = $request->input('id_tipo_doc');

        $nuevoProceso->save();

        return redirect()->route('partes.create', ['id' => $nuevoProceso->id])->with('agregado', 'agregado');
    }
    public function detalle($id_proceso)
    {
        // Obtener el proceso
        $proceso = Proceso::find($id_proceso);
        $users = User::all();

        // Obtener el archivo relacionado
        $archivo = Archivo::where('id_proceso', $id_proceso)->first();

        // Obtener el ID del archivo de Google Drive desde la base de datos
        $fileId = DB::table('archivos')
            ->where('id_proceso', $id_proceso)
            ->value('id_google_drive');

        // Obtener ID del archivo
        $id_archivos = DB::table('archivos')
            ->select('archivos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->where('archivos.id_proceso', $id_proceso)
            ->pluck('archivos.id');

        // Obtener la lista de visadores
        $visadores = DB::table('users')
            ->select('users.name', 'users.rut')
            ->join('visadors', 'visadors.id_usuario', '=', 'users.id')
            ->whereIn('visadors.id_archivo', $id_archivos)
            ->get();

        $firmadores = DB::table('users')
            ->select('users.name', 'users.rut')
            ->join('firmadors', 'firmadors.id_usuario', '=', 'users.id')
            ->whereIn('firmadors.id_archivo', $id_archivos)
            ->get();

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

        return view('partes.create', [
            'proceso' => $proceso,
            'archivo' => $archivo,
            'fileId' => $fileId,
            'mimeType' => $mimeType,
            'users' => $users,
            'visadores' => $visadores
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */

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
    public function show(Proceso $proceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proceso $proceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proceso $proceso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proceso $proceso)
    {
        //
    }
}
