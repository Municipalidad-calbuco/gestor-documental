<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DynamicFirma extends Component
{
    public $inputs = [];

    public array $users;

    public int $user_id;
    public int $name = 0;
    public function addInput()
    {
        $this->inputs[] = '';
        $this->emit('select2');
    }
    public function mount()
    {
        $this->users = User::pluck("name", "id")->toArray();
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|min:2|max:30',
        ];
    }
    public function hydrate()
    {
        $this->emit('select2');
    }
    public function removeInput($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }
    public function render()
    {
        return view('livewire.dynamic-firma');
    }
}
