<?php

namespace App\Livewire;

use App\Models\Firmador;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TableFirmar extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $userId;
    public $countFirmar;
    public $error;
    public $perPage = 1;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->countFirmar = Firmador::where('estado', 'En espera')->count();
    }

    public function render()
    {
        try {
            $this->userId = Auth::id();

            $firmar = DB::table('procesos')
                ->select('procesos.descripcion', 'tipo_documentos.nombre_doc', 'firmadors.estado', 'cargos.nombre_cargo', 'archivos.nombre_archivo')
                ->join('archivos', 'archivos.id_proceso', '=', 'procesos.id')
                ->join('firmadors', 'firmadors.id_archivo', '=', 'archivos.id')
                ->join('tipo_documentos', 'tipo_documentos.id', '=', 'procesos.id_tipo_doc')
                ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
                ->where('firmadors.id_usuario', $this->userId)
                ->paginate($this->perPage);

            Log::info('Paginación: Total ' . $firmar->total() . ', Por página ' . $firmar->perPage() . ', Página actual ' . $firmar->currentPage());

            if ($firmar->isEmpty()) {
                $this->error = 'No se encontraron registros.';
            }

            return view('livewire.table-firmar', [
                'firmar' => $firmar,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in TableFirmar render method: ' . $e->getMessage());
            $this->error = 'Ocurrió un error al cargar los datos.';
            return view('livewire.table-firmar', [
                'firmar' => collect(),
            ]);
        }
    }
}
