<?php

namespace App\Http\Livewire\Proyecto;

use App\Models\Historia;
use Livewire\Component;

class Historias extends Component
{

    public $idproyecto;

    public function render()
    {

       
        $historias = Historia::where('proyecto_id',$this->idproyecto)->orderBy('id','DESC')->get();

        $total = $historias ->count();
        return view('livewire.proyecto.historias', compact('historias','total'));
    }
}
