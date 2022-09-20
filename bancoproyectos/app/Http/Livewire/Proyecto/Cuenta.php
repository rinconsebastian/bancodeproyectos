<?php

namespace App\Http\Livewire\Proyecto;

use Livewire\Component;
use App\Models\Proyecto;

class Cuenta extends Component
{

    public $estado; 
    public $color2 = "text-blue-500 bg-indigo-50";
    public $usuario='';
   


    public function render()
    {
        $formulador = in_array("proyectos.presentar",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $evaluador = in_array("proyectos.aprobar",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $registrador = in_array("proyectos.registrar",auth()->user()->getAllPermissions()->pluck('name')->toArray());

        $color = '';




        if ($formulador == true) {
            
            $total = Proyecto::where('estado', 'like', '%' . $this->estado . '%')
                ->where('user_id', $this->usuario)
                ->count();
        } else {
            $total = Proyecto::where('estado', 'like', '%' . $this->estado . '%')
            ->count();
        }
      
        switch($this->estado){
            case "Borrador":
                $color = ($formulador & $total>0)? "orange":""; 
            break;
            case "Presentado":
                case "Revisión":
                $color = ($evaluador & $total>0)? "orange":""; 
            break;
            case "Aprobado":
                $color = ($registrador & $total>0)? "orange":""; 
            break;
            case "Devuelto":
            case "Ajustes":
                $color = ($formulador & $total>0)? "orange":""; 
            break;
           
        }
      
        return view('livewire.proyecto.cuenta', compact('total','color'));
    }
}
