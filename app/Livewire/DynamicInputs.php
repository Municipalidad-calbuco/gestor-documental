<?php

namespace App\Livewire;

use Livewire\Component;

class DynamicInputs extends Component
{
    public $inputs = [];


    public $visadores = []; // Añade esta línea para almacenar las opciones de visadores

    public function mount()
    {
        // Carga las opciones de visadores (esto podría venir de una base de datos)
        $this->visadores = [
            ['id' => 1, 'name' => 'Visador 1'],
            ['id' => 2, 'name' => 'Visador 2'],
            ['id' => 3, 'name' => 'Visador 3'],
            // ... más opciones
        ];
    }

    public function addInput()
    {
        $this->inputs[] = '';
    }
    
    public function updateInput($index, $value)
    {
        $this->inputs[$index] = $value;
    }

    public function removeInput($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }
    public function render()
    {
        return view('livewire.dynamic-inputs');
    }
}
