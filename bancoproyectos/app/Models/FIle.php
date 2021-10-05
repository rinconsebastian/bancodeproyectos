<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable =['detalle', 'tipo','url', 'estado' ];

    // relacion muchos a muchos polimorfica (inversa
    
    public function Revisiones(){
        return $this->morphedByMany('App\Models\Revision','fileable');
    }
    public function Historias(){
        return $this->morphedByMany('App\Models\Historia','fileable');
    }
    public function Proyectos(){
        return $this->morphedByMany('App\Models\Proyecto','fileable');
    }

}
