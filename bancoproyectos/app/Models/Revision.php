<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;


    public function historia(){

        return $this->belongsTo('App\Models\Historia');
    }

    // relacion muchos a muchos polimorfica
    public function files(){

        return $this->morphToMany('App\Models\File','fileable');
    }
}
