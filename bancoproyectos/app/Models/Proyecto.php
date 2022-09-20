<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;


    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    // relacion uno a muchos 
    public function historias(){

        return $this->hasMany('App\Models\Historia');
    }

    // relacion muchos a muchos polimorfica
    public function files(){

        return $this->morphToMany('App\Models\File','fileable');
    }

   

}
