<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use App\Models\Proyecto;
use Livewire\WithPagination;


class ShowProyectos extends Component
{
    use WithPagination;
 
    public $estado='';
    public $usuario='';
    public $search; 
    public $sort ='name';
    public $direction ='asc';
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
                ->paginate(10);
        } else {
            $proyectos = Proyecto::where('name', 'like', '%' . $this->search . '%')
                ->where('estado', 'like', '%' . $this->estado . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate(10);
        }
        return view('livewire.tables.show-proyectos', compact('proyectos'));
    }

    public function updatingSearch(){
        $this->resetPage();
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
