<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use App\Models\Proyecto;

class ShowProyectos extends Component
{
 
    public $search; 
    public $sort ='id';
    public $direction ='desc';
 
    public function render()
    {

        $proyectos = Proyecto::where('name','like','%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.tables.show-proyectos',compact('proyectos'));
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
}
