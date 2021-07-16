<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;


    public function proyecto(){

        return $this->belongsTo('App\Models\Proyecto');
    }

    // relacion uno a uno 
    public function revision(){

        return $this->hasOne('App\Models\Revision');
    }

    // relacion muchos a muchos polimorfica
    public function files(){

        return $this->morphToMany('App\Models\File','fileable');
    }

}
