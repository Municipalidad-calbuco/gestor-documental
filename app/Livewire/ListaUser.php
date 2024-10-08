<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class ListaUser extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
        return view('livewire.lista-user', [
            'users' => User::where('name',  'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }
}
