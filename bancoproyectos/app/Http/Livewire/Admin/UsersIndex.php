<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;


    public $search; 
    public $sort ='id';
    public $direction ='desc';
  
    
    public function render()
    {
                
        
        $users = User::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate(15);
     
        return view('livewire.admin.users-index',compact('users'));
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

    public function open($user){
        
        return redirect()->route('admin.users.show',$user);
    }

}
 