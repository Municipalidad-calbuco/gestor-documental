<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use Livewire\WithPagination;

class TableVisar extends Component

{
    use WithPagination;
    public $userId;
    public $visar;

    public function mount()
    {
        $userId = Auth::user()->id;
        $this->visar = DB::table('procesos')
            ->select('procesos.descripcion', 'procesos.id', 'tipo_documentos.nombre_doc', 'visadors.estado', 'archivos.nombre_archivo')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
            ->where('visadors.id_usuario', $userId)
            ->get();
    }

    public function render()
    {
        return view('livewire.table-visar');
    }
}
