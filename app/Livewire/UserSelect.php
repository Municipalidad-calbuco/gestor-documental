<?php

namespace App\Livewire;

use App\Models\Archivo;
use App\Models\Cargo;
use App\Models\Firmador;
use App\Models\Proceso;
use App\Models\User;
use App\Models\UserCargo;
use App\Models\Visador;
use Livewire\Component;
use Livewire\WithEvents;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class UserSelect extends Component
{
    public $userSearch = '';
    public $cargoSearch = '';
    public $selectedUserId;
    public $selectedUserName = '';
    public $selectedCargoId;
    public $selectedCargoName = '';
    public $isUserOpen = false;
    public $isCargoOpen = false;

    public $id_usuario;
    public $id_cargo;
    public $id_archivo;

    public $id;
    public $firmador;
    public $archivo;

    public function mount($id)
    {
        $this->id = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->archivo = Archivo::where('id_proceso', $this->id)->firstOrFail();

        $this->firmador = DB::table('users')
            ->select('users.name', 'firmadors.id', 'cargos.nombre_cargo')
            ->join('firmadors', 'firmadors.id_usuario', '=', 'users.id')
            ->join('archivos', 'archivos.id', '=', 'firmadors.id_archivo')
            ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
            ->where('archivos.id', $this->archivo->id)
            ->get();
    }

    public function mountfirma()
    {
    }

    public function resetUserDropdown()
    {
        $this->userSearch = '';
        $this->isUserOpen = false;
    }

    public function resetCargoDropdown()
    {
        $this->cargoSearch = '';
        $this->isCargoOpen = false;
    }

    public function toggleUserDropdown()
    {
        $this->isUserOpen = !$this->isUserOpen;
        if ($this->isUserOpen) {
            $this->userSearch = '';
        }
    }

    public function toggleCargoDropdown()
    {
        $this->isCargoOpen = !$this->isCargoOpen;
        if ($this->isCargoOpen) {
            $this->cargoSearch = '';
        }
    }

    public function selectUser($userId)
    {
        $selectedUser = User::find($userId);
        if ($selectedUser) {
            $this->selectedUserId = $userId;
            $this->selectedUserName = $selectedUser->name;
            $this->resetUserDropdown();
            $this->selectedCargoId = null;
            $this->selectedCargoName = '';
            $this->id_usuario = $userId;
        }
    }

    public function selectCargo($cargoId)
    {
        $selectedCargo = Cargo::find($cargoId);
        if ($selectedCargo) {
            $this->selectedCargoId = $cargoId;
            $this->selectedCargoName = $selectedCargo->nombre_cargo;
            $this->resetCargoDropdown();
            $this->id_cargo = $cargoId;
        }
    }

    #[Computed]
    public function filteredUsers()
    {
        return User::where('name', 'like', '%' . $this->userSearch . '%')->get();
    }

    #[Computed]
    public function filteredCargos()
    {
        if (!$this->selectedUserId) {
            return collect();
        }
        return Cargo::whereHas('users', function ($query) {
            $query->where('users.id', $this->selectedUserId);
        })->where('nombre_cargo', 'like', '%' . $this->cargoSearch . '%')->get();
    }

    public function save()
    {
        Firmador::create([
            'id_usuario' => $this->id_usuario,
            'id_cargo' => $this->id_cargo,
            'id_archivo' => $this->archivo->id,
        ]);
        session()->flash('message', 'Firmador Agregado Correctamente.');
        // Opcional: Reiniciar los campos del formulario
        $this->reset(['selectedUserName', 'selectedCargoName']);
        $this->firmador = DB::table('users')
            ->select('users.name', 'firmadors.id', 'cargos.nombre_cargo')
            ->join('firmadors', 'firmadors.id_usuario', '=', 'users.id')
            ->join('archivos', 'archivos.id', '=', 'firmadors.id_archivo')
            ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
            ->where('archivos.id', $this->archivo->id)
            ->get();
        // Opcional: Mensaje de éxito

    }
    public function destroy($id)
    {
        $firmador = Firmador::find($id);
        $firmador->delete();
        $this->firmador = DB::table('users')
            ->select('users.name', 'firmadors.id', 'cargos.nombre_cargo')
            ->join('firmadors', 'firmadors.id_usuario', '=', 'users.id')
            ->join('archivos', 'archivos.id', '=', 'firmadors.id_archivo')
            ->join('cargos', 'cargos.id', '=', 'firmadors.id_cargo')
            ->where('archivos.id', $this->archivo->id)
            ->get();
    }
    public function render()
    {

        return view('livewire.user-select')->layout('partes.firmas');
    }
}
