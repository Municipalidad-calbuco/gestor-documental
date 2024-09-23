<?php

namespace App\Livewire;

use App\Models\Archivo;
use App\Models\Proceso;
use App\Models\Visador;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListaVisadores extends Component
{

    public $listaVisadores;
    public $procesoId;
    public $countVisadores;

    public function mount($id)
    {
        $this->procesoId = $id;
        $this->getVisadoresInfo();
        $this->countVisadores = DB::table('procesos')
            ->select('visadors.estado', 'visadors.fecha_visacion', 'users.name')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('users', 'users.id', '=', 'visadors.id_usuario')
            ->where('procesos.id', $this->procesoId)
            ->count();
    }

    private function getVisadoresInfo()
    {
        $this->listaVisadores = DB::table('procesos')
            ->select('visadors.estado', 'visadors.fecha_visacion', 'users.name')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('visadors', 'visadors.id_archivo', '=', 'archivos.id')
            ->join('users', 'users.id', '=', 'visadors.id_usuario')
            ->where('procesos.id', $this->procesoId)
            ->get();
    }
    public function render()
    {
        return view('livewire.lista-visadores');
    }
}
