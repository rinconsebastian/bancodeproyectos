<?php

namespace App\Http\Livewire\Proyecto;

use App\Models\File;
use App\Models\Historia;
use App\Models\Tiposarchivos;
use Livewire\Component;
use Livewire\WithFileUploads;

class Documentos extends Component
{
    use WithFileUploads;

    public $idhistoria;
    public $historiaestado;
    public $fileTitle, $fileName;

    public $filenabled = "disabled";
    public $fileclass = "cursor-not-allowed";
    public $nombreDoc = "Seleccione un archivo";
    public $statusUploadBtn = "disabled";
    public $classUploadBtn = "bg-white text-gray-300 hover:bbg-gray-500 cursor-not-allowed";
    public $disponible = false;


    public function render()
    {
        $historia = Historia::find($this->idhistoria);
        $this->historiaestado = $historia->estado;

        $presentar = in_array("proyectos.presentar",auth()->user()->getAllPermissions()->pluck('name')->toArray());

       
        if(($historia->estado == "Borrador" or $historia->estado == "Ajustes") and $historia->proyecto->user_id == auth()->user()->id  and  $presentar){
           
            $this->disponible = true;
        }


        $tipos = array("Seleccione"); 
        
        $tipos = array_merge($tipos,Tiposarchivos::where('grupo','proyecto')->pluck('texto','texto')->toarray());

        //$tipos = Tiposarchivos::where('grupo','proyecto')->pluck('texto','texto');

        $documentos = $historia->files;
        return view('livewire.proyecto.documentos', compact('documentos','tipos'));
    }

    public function submit()
    {
        $dataValid = $this->validate([
            'fileTitle' => 'required',
            'fileName' => 'required|mimes:pdf,jpg,jpeg,png,svg,xls,xlsx,xlsm,doc,docx,docm,zip,rar,dwg|max:20480',
        ]);
  
        $historia = Historia::find($this->idhistoria);

//        $dataValid['fileName'] = $this->fileName->store($historia->proyecto_id, 'public');
        $dataValid['fileName'] = $this->fileName->store('Proyectos/'. $historia->proyecto_id, 'public');

       


        
        

        $historia->files()->create([
            'tipo' => $this->fileName->getMimeType(),
            'detalle' =>  $this->fileTitle,
            'url' => $dataValid['fileName']

        ]);


        $this->statusUploadBtn = "disabled";
        $this->classUploadBtn ="bg-white text-gray-300 hover:bbg-gray-500 cursor-not-allowed";

        $this->fileclass = "cursor-not-allowed";
        $this->filenabled = "disabled";

        $this->fileName = null;
        $this->nombreDoc = null;

        
        //$this->addError('fileName', 'el campo es requerido');
  
        //session()->flash('message', 'File uploaded.');
        
    }
    
     public function updatedfileName()
    {
        $dataValid = $this->validate([
            'fileTitle' => 'required',
            'fileName' => 'required|mimes:pdf,jpg,jpeg,png,svg,xls,xlsx,xlsm,doc,docx,docm,zip,rar,dwg|max:20480',            
        ]);
       
        $this->nombreDoc = $this->fileName->getClientOriginalName();

        $this->statusUploadBtn = "";
        $this->classUploadBtn = "bg-green-700 text-green-100 hover:bg-green-800 border-gray-500";

    } 

    public function updatedfileTitle()
    {
        if($this->fileTitle !== "0" && $this->fileTitle !== null){
            $this->fileclass = "text-gray-600 hover:text-black cursor-pointer border-gray-500";
            $this->filenabled = "";
        }else{
            $this->fileclass = "cursor-not-allowed";
            $this->filenabled = "disabled";
        }
       
    } 

    public function export($id){
       

        $doc =File::find($id);

        $hist = $doc->Historias()->first();

        $nombre="P" . $hist->proyecto_id ."_H" . $hist->id . "_". $doc->detalle ."_". $doc->created_at->format('Y-m-d'); 
        $extension = current(array_reverse(explode('.',$doc->url)));
        return response()->download(storage_path("/app/public/". $doc->url),$nombre. "." .$extension);


    }
   

}
