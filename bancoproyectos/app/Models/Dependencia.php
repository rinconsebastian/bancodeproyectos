<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;



    // relacion uno a muchos anidada
    public function hijos(){

        return $this->hasMany('App\Models\Dependencia');
    }


    // relacion uno a muchos anidada (inversa)
    public function padre(){

        return $this->belongsTo('App\Models\Dependencia','dependencia_id','id');
    }

    // relacion uno a muchos anidada
    public function usuarios(){

        return $this->hasMany('App\Models\User');
    }

}