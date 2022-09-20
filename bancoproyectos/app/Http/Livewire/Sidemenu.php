<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidemenu extends Component
{
    
    public $verusuarios = false;

    public $verroles = false;


    public function render()
    {

        $this->verusuarios = in_array("admin.users.index", auth()->user()->getAllPermissions()->pluck('name')->toArray());

        $this->verroles = in_array("admin.roles.index", auth()->user()->getAllPermissions()->pluck('name')->toArray());


        return view('livewire.sidemenu');
    }
}
