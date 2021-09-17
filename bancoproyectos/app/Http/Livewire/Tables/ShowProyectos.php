<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use App\Models\Proyecto;


class ShowProyectos extends Component
{
 
    public $estado='';
    public $usuario='';
    public $search; 
    public $sort ='id';
    public $direction ='desc';
    public $displayestado = false;
    

    public function render()
    {
//     $this->formulador = auth()->user()->can("proyectos.create");
       $formulador = in_array("proyectos.create",auth()->user()->getAllPermissions()->pluck('name')->toArray());

       
        if ($formulador == true) {

            $proyectos = Proyecto::where('name', 'like', '%' . $this->search . '%')
                ->where('estado', 'like', '%' . $this->estado . '%')
                ->where('user_id', $this->usuario)
                ->orderBy($this->sort, $this->direction)
                ->get();
        } else {
            $proyectos = Proyecto::where('name', 'like', '%' . $this->search . '%')
                ->where('estado', 'like', '%' . $this->estado . '%')
                ->orderBy($this->sort, $this->direction)
                ->get();
        }
        return view('livewire.tables.show-proyectos', compact('proyectos'));
    }

    public function order($sort){
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            
        }else{
            $this->sort = $sort;
        }

        
    }

    public function open($id){
        
        return redirect()->route('proyectos.show',$id);
    }
}
