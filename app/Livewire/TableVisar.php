<?php

namespace App\Livewire;

use App\Models\Visador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use Livewire\WithPagination;

class TableVisar extends Component

{
    use WithPagination;
    public $userId;
    public $visar;
    public $finalizados;
    public $rechazo;
    public $countFirmar;

    public function mount()
    {
        $this->countFirmar = Visador::where('estado', 'Visar')->count();
    }

    public function render()
    {
        $userId = Auth::user()->id;
        $this->visar = DB::table('procesos')
            ->select('procesos.descripcion', 'procesos.id', 'tipo_documentos.nombre_doc', 'visadors.estado', 'archivos.nombre_archivo')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
            ->where('visadors.id_usuario', $userId)
            ->where('visadors.estado', '=', 'Visar')

            ->get();

        $this->finalizados = DB::table('procesos')
            ->select('procesos.descripcion', 'procesos.id', 'tipo_documentos.nombre_doc', 'visadors.estado', 'visadors.fecha_visacion', 'archivos.nombre_archivo')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
            ->where('visadors.id_usuario', $userId)
            ->where('visadors.estado', '=', 'Visado')
            ->get();

        $this->rechazo = DB::table('procesos')
            ->select('procesos.descripcion', 'procesos.id', 'tipo_documentos.nombre_doc', 'visadors.estado', 'visadors.fecha_visacion', 'visadors.observacion', 'archivos.nombre_archivo')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
            ->where('visadors.id_usuario', $userId)
            ->where('visadors.estado', '=', 'Rechazado')
            ->get();
        return view('livewire.table-visar');
    }
}
