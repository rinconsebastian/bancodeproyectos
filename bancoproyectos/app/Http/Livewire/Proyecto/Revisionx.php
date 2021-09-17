<?php

namespace App\Http\Livewire\Proyecto;

use App\Models\Revision;
use App\Models\Historia;
use Livewire\Component;

class Revisionx extends Component
{
    public $idhistoria;
    public $detalle;
    public $editrevision = false;
    public $crearrevision = false;
   

    public function render()
    {

        $revision = Revision::where('historia_id', $this->idhistoria)->first();

        if ($revision != null) {
            $this->detalle = $revision->detalle;


            if ($revision->historia->proyecto->estado == "Revisión") {
                $this->editrevision = true;
            }
        } else {
            $historia = Historia::find($this->idhistoria);
            if ($historia != null) {
                if ($historia->estado == "Finalizada" and $historia->proyecto->estado == "Presentado") {
                    $this->crearrevision = true;
                }
            }
          
        }


        return view('livewire.proyecto.revisionx', compact('revision'));
    }


    

    public function updateddetalle()
    {

        $revision = Revision::where('historia_id', $this->idhistoria)->first();

        $revision->detalle = $this->detalle;
        $revision->save();
    }
}
