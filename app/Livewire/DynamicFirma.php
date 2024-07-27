<?php

namespace App\Livewire;

use Livewire\Component;

class DynamicFirma extends Component
{
    public $inputs = [];

    public function addInput()
    {
        $this->inputs[] = '';
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
