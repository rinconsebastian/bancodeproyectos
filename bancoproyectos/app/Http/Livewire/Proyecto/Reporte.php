<?php

namespace App\Http\Livewire\Proyecto;

use Livewire\Component;
use App\Models\Proyecto;

class Reporte extends Component
{
   
    public $usuario='';

    public function render()
    {
        $formulador = in_array("proyectos.create",auth()->user()->getAllPermissions()->pluck('name')->toArray());

       
        if ($formulador == true) {

            $proyectos = Proyecto::where('user_id', $this->usuario)->get();
        } else {
            $proyectos = Proyecto::all();

        }

        $proyectosjson =  (string) $proyectos;

        return view('livewire.proyecto.reporte', compact('proyectosjson'));
    }
}
