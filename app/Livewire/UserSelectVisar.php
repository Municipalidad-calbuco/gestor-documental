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

class UserSelectVisar extends Component
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
    public $visador;
    public $archivo;

    public function mount($id)
    {
        $this->id = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->archivo = Archivo::where('id_proceso', $this->id)->firstOrFail();
        $this->visador = DB::table('users')
            ->select('users.name', 'visadors.id', 'users.rut')
            ->join('visadors', 'visadors.id_usuario', '=', 'users.id')
            ->join('archivos', 'archivos.id', '=', 'visadors.id_archivo')
            ->where('archivos.id', $this->archivo->id)
            ->get();
    }

    public function mountfirma() {}

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


    #[Computed]
    public function filteredUsers()
    {
        return User::where('name', 'like', '%' . $this->userSearch . '%')->get();
    }


    public function save()
    {
        Visador::create([
            'id_usuario' => $this->id_usuario,
            'id_archivo' => $this->archivo->id,
        ]);
        session()->flash('message', 'Visador Agregado Correctamente.');
        // Opcional: Reiniciar los campos del formulario
        $this->reset(['selectedUserName', 'selectedCargoName']);
        $this->visador = DB::table('users')
            ->select('users.name', 'visadors.id', 'users.rut')
            ->join('visadors', 'visadors.id_usuario', '=', 'users.id')
            ->join('archivos', 'archivos.id', '=', 'visadors.id_archivo')
            ->where('archivos.id', $this->archivo->id)
            ->get();
        // Opcional: Mensaje de éxito

    }
    public function destroy($id)
    {
        $visador = Visador::find($id);
        $visador->delete();
        $this->visador = DB::table('users')
            ->select('users.name', 'visadors.id', 'users.rut')
            ->join('visadors', 'visadors.id_usuario', '=', 'users.id')
            ->join('archivos', 'archivos.id', '=', 'visadors.id_archivo')
            ->where('archivos.id', $this->archivo->id)
            ->get();
    }
    public function render()
    {
        return view('livewire.user-select-visar')->layout('partes.firmas');
    }
}
