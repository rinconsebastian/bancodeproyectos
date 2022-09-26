<?php

namespace App\Http\Livewire\Proyecto;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;
use App\Models\Revision;
use App\Models\Tiposarchivos;

class DocumentosRevisionx extends Component
{
    use WithFileUploads;

    public $idRevision;
    public $fileTipo, $fileName2;

    public $filenabled2 = "disabled";
    public $fileclass2 = "cursor-not-allowed";
    public $nombreDoc2 = "Seleccione un archivo";
    public $statusUploadBtn2 = "disabled";
    public $classUploadBtn2 = "bg-gray-100 dark:bg-gray-900 text-gray-300 hover:bbg-gray-500 cursor-not-allowed";
    public $edit;
    public $disponible = false;

    protected $listeners = ['deleteFilerev'];
    public function render()
    {
        $revision = Revision::find($this->idRevision);

       
        $devolver = in_array("proyectos.devolver",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        //$tipos = Tiposarchivos::where('grupo','proyecto')->pluck('texto','texto');

        if((($revision->estado == "Borrador" or $revision->estado == "Ajustes") and  $devolver) ){
           
            $this->disponible = true;
        }

       
        $documentos = $revision->files;


        $tiposdoc = $documentos->pluck('detalle');
        
        $tipos = array("Seleccione"); 
        
        $tipos = array_merge($tipos,Tiposarchivos::where('grupo','revision')->whereNotIn('texto', $tiposdoc)->orderBy('texto')->pluck('texto','texto')->toarray());

        return view('livewire.proyecto.documentos-revisionx', compact('documentos','tipos'));
    }

    public function submit()
    {
        $dataValid = $this->validate([
            'fileTipo' => 'required',
            'fileName2' => 'required|max:200000',
        ]);
  
        $revision = Revision::find($this->idRevision);

//        $dataValid['fileName'] = $this->fileName->store($historia->proyecto_id, 'public');
        $dataValid['fileName2'] = $this->fileName2->store('Proyectos/'. $revision->historia->proyecto_id, 'public');

       


        
        

        $revision->files()->create([
            'tipo' => $this->fileName2->getMimeType(),
            'detalle' =>  $this->fileTipo,
            'estado' => "Nuevo",
            'url' => $dataValid['fileName2']

        ]);


        $this->statusUploadBtn2 = "disabled";
        $this->classUploadBtn2 ="bg-gray-100 dark:bg-gray-900 text-gray-300 hover:bbg-gray-500 cursor-not-allowed";

        $this->fileclass2 = "cursor-not-allowed";
        $this->filenabled2 = "disabled";

        $this->fileName2 = null;
        $this->nombreDoc2 = null;

        
        //$this->addError('fileName', 'el campo es requerido');
  
        //session()->flash('message', 'File uploaded.');
        
    }
    
     public function updatedfileName2()
    {
        $dataValid = $this->validate([
            'fileTipo' => 'required',
            'fileName2' => 'required|max:200000',            
        ]);
       
        $this->nombreDoc2 = $this->fileName2->getClientOriginalName();

        $this->statusUploadBtn2 = "";
        $this->classUploadBtn2 = "bg-green-700 text-green-100 hover:bg-green-800 border-gray-500";

    } 

    public function updatedfileTipo()
    {

        
        if($this->fileTipo !== "0" && $this->fileTipo !== null){
            $this->fileclass2 = "text-gray-600 hover:text-black cursor-pointer border-gray-500";
            $this->filenabled2 = "";
        }else{
            $this->fileclass2 = "cursor-not-allowed";
            $this->filenabled2 = "disabled";
        }
       
    } 

    public function export($id){
       

        $doc =File::find($id);

        $rev = $doc->Revisiones()->first();

        $nombre="P" . $rev->historia->proyecto_id ."_H" . $rev->historia->id . "_". $doc->detalle ."_". $doc->created_at->format('Y-m-d'); 
        $extension = current(array_reverse(explode('.',$doc->url)));
        return response()->download(storage_path("/app/public/". $doc->url),$nombre. "." .$extension);


    }

    public function deleteFilerev($ids)
    {

        $doc = File::find($ids);
        $revision = $doc->Revisiones()->first();

       
        $devolver = in_array("proyectos.devolver",auth()->user()->getAllPermissions()->pluck('name')->toArray());

        if (($revision->estado == "Borrador" )   and  $devolver) {


            $resultado = $doc->delete();

            if ($resultado == true) {
                $this->dispatchBrowserEvent('swal-modal', [
                    'type' => 'success',
                    'title' => 'Se ha borrado el archivo de forma exitosa',
                    'text' => '',
                    'confirmButtonColor' => '#3085d6',
                ]);
            } else {
                $this->dispatchBrowserEvent('swal-modal', [
                    'type' => 'error',
                    'title' => 'Imposible borrar el archivo',
                    'text' => '',
                    'confirmButtonColor' => '#d33',
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('swal-modal', [
                'type' => 'error',
                'title' => 'Imposible borrar el archivo',
                'text' => '',
                'confirmButtonColor' => '#d33',
            ]);
        }
    }
   

}
