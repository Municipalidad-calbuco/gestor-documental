<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSelect extends Component
{

    public $selectedUserId;
    public $users;
    public $usuarios = [];


    public function mount()
    {
        $this->users = User::all();
    }

    public function updatedSelectedUserId()
    {
        $this->emit('userSelected', $this->selectedUserId);
    }



    public function render()
    {
        return view('livewire.user-select');
    }
}
