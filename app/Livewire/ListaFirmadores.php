<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListaFirmadores extends Component
{
    public $listaFirmadores;
    public $procesoId;
    public $countFirmadores;

    public function mount($id)
    {
        $this->procesoId = $id;
        $this->getFirmadoresinfo();
        $this->countFirmadores = DB::table('procesos')
            ->select('firmadors.estado', 'firmadors.fecha_firma', 'users.name')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('firmadors', 'firmadors.id_archivo', '=', 'archivos.id')
            ->join('users', 'users.id', '=', 'firmadors.id_usuario')

            ->where('procesos.id', $this->procesoId)
            ->count();
    }

    private function getFirmadoresinfo()
    {
        $this->listaFirmadores = DB::table('procesos')
            ->select('firmadors.estado', 'firmadors.fecha_firma', 'cargos.nombre_cargo', 'users.name')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('firmadors', 'firmadors.id_archivo', '=', 'archivos.id')
            ->join('users', 'users.id', '=', 'firmadors.id_usuario')
            ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
            ->where('procesos.id', $this->procesoId)
            ->get();
    }

    public function render()
    {
        return view('livewire.lista-firmadores');
    }
}
