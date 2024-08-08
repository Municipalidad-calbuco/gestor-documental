<?php

namespace App\Livewire;

use App\Models\Proceso;
use App\Models\User;
use App\Models\Visador;
use Livewire\Component;

class UserSelect extends Component
{

    public $users;

    public $usuarios = [];
    public $archivoId;
    public function mount($archivoId)
    {
        $this->users = User::all();
        $this->archivoId = $archivoId;
    }

    public function save()
    {
        foreach ($this->selectedUserIds as $userId) {
            Visador::create([
                'id_usuario' => $userId,
                'id_archivo' => $this->archivoId,

            ]);
        }

        session()->flash('message', 'Usuarios agregados exitosamente.');

        // Puedes realizar cualquier acción de guardado aquí.
    }


    public function render()
    {
        return view('livewire.user-select');
    }
}
