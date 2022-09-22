<?php

namespace App\Http\Livewire\Proyecto;

use App\Models\File;
use App\Models\Historia;
use App\Models\Proyecto;
use Livewire\Component;

class Documentosaprobados extends Component
{

    
    public $idproyecto;
    public $tipo;
    public $registro;
    public $proyecto;

    public function render()
    {
    $files = collect();
        
        
        $historias = Historia::where('proyecto_id',$this->idproyecto)->orderBy('id','DESC')->get();
        $total = $historias->count();

        foreach($historias as $historia){

            foreach($historia->files as $file) {

                $files->add($file);
            }


        }
       
    $files = $files->where('estado','Aprobado')->sortBy('id')->groupBy('detalle');

    //incluyendo certificado de registro
    $this->proyecto = Proyecto::find($this->idproyecto);
    


        return view('livewire.proyecto.documentosaprobados',compact('files','total'));
    }

    public function export($id)
    {


        $doc = File::find($id);

        $hist = $doc->Historias()->first();

        $nombre = "P" . $hist->proyecto_id . "_H" . $hist->id . "_" . $doc->detalle . "_" . $doc->created_at->format('Y-m-d');
        $extension = current(array_reverse(explode('.', $doc->url)));


        return response()->download(storage_path("/app/public/" . $doc->url), $nombre . "." . $extension);
    }
}
