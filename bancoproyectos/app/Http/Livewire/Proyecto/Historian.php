<?php

namespace App\Http\Livewire\Proyecto;

use App\Models\Historia;
use Livewire\Component;
use App\Models\File;

class Historian extends Component
{

    public $idhistoria;
    public $num;
    public $open;

    public function render()
    {
        $n = $this->num;
        $historia = Historia::find($this->idhistoria);

        return view('livewire.proyecto.historian', compact(["historia","n"]));
    }
}
