<?php

namespace App\Livewire;

use App\Models\Firmador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableFirmar extends Component
{
    public $userId;
    public $firmar;
    public $countFirmar;
    public function mount()
    {
        $this->countFirmar = Firmador::where('estado', 'En espera')->count();

        $userId = Auth::user()->id;
        $this->firmar = DB::table('procesos')
            ->select('procesos.descripcion', 'tipo_documentos.nombre_doc', 'firmadors.estado', 'cargos.nombre_cargo', 'archivos.nombre_archivo')
            ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
            ->join('firmadors', 'firmadors.id_archivo', '=', 'archivos.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
            ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
            ->where('firmadors.id_usuario', $userId)
            ->get();
    }
    public function render()
    {
        return view('livewire.table-firmar');
    }
}
