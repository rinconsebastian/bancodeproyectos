<?php

namespace App\Http\Livewire\Proyecto;

use Livewire\Component;
use App\Models\Proyecto;

class Cuenta extends Component
{

    public $estado; 
    public $color = "text-blue-500 bg-indigo-50";
    public $usuario='';


    public function render()
    {
        $formulador = in_array("proyectos.create",auth()->user()->getAllPermissions()->pluck('name')->toArray());


        if ($formulador == true) {

            $total = Proyecto::where('estado', 'like', '%' . $this->estado . '%')
                ->where('user_id', $this->usuario)
                ->count();
        } else {
            $total = Proyecto::where('estado', 'like', '%' . $this->estado . '%')
            ->count();
        }
      
        
      
        return view('livewire.proyecto.cuenta', compact('total'));
    }
}
