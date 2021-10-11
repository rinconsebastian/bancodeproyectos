<?php

namespace App\Http\Livewire\Admin;

use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RolesIndex extends Component
{
    public $search; 
    public $sort ='id';
    public $direction ='desc';
   
   
    public function render()
    {

        $roles = Role::where('name', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate();
     
        return view('livewire.admin.roles-index',compact('roles'));

      
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

}
