<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Proyecto;

class Resumen extends Component
{
    public $idusuario;


    public function render()
    {

        


        return view('livewire.dashboard.resumen');
    }
}
