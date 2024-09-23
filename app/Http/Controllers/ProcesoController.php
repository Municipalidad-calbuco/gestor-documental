<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use App\Models\User;
use App\Models\Visador;
use Exception;
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
    public function detalle($id)
    {
        // dd($id_proceso); // Para verificar el valor de $id_proceso

        // // Verificar si el ID del proceso es válido
        // if (!is_numeric($id_proceso) || $id_proceso <= 0) {
        //     return back()->with('error', 'ID de proceso no válido.');
        // }

        // Obtener el proceso
        $proceso = Proceso::find($id);
        // if (!$proceso) {
        //     return back()->with('error', 'Proceso no encontrado.');
        // }

        // Obtener todos los usuarios
        $users = User::all();

        // Obtener el archivo relacionado al proceso
        $archivo = Archivo::where('id_proceso', $id)->first();


        // Obtener el ID del archivo de Google Drive desde la base de datos
        $fileId = $archivo->id_google_drive;




        // Obtener IDs de archivos relacionados con el proceso
        $id_archivos = DB::table('archivos')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->where('archivos.id_proceso', $id)
            ->pluck('archivos.id');

        // Obtener la lista de visadores
        $visadores = DB::table('users')
            ->select('users.name', 'users.rut')
            ->join('visadors', 'visadors.id_usuario', '=', 'users.id')
            ->whereIn('visadors.id_archivo', $id_archivos)
            ->get();

        // Obtener la lista de firmadores
        $firmadores = DB::table('users')
            ->select('users.name', 'users.rut')
            ->join('firmadors', 'firmadors.id_usuario', '=', 'users.id')
            ->whereIn('firmadors.id_archivo', $id_archivos)
            ->get();

        // Inicializar Google Client
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        // Inicializar el servicio de Google Drive
        $service = new Google_Service_Drive($client);

        // Obtener metadatos del archivo
        try {
            $fileMetadata = $service->files->get($fileId);
            $mimeType = $fileMetadata->getMimeType();
        } catch (Exception $e) {
            return back()->with('error', 'Error al obtener los metadatos del archivo: ' . $e->getMessage());
        }

        // Retornar la vista con los datos necesarios
        return view('partes.create', [
            'proceso' => $proceso,
            'archivo' => $archivo,
            'fileId' => $fileId,
            'mimeType' => $mimeType,
            'users' => $users,
            'visadores' => $visadores,
            'firmadores' => $firmadores
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
