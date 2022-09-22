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

    public $authAprobarArchivo = false;
    public $authRechazarArchivo = false;
    public $last = false;


    protected $listeners = ['deleteFile','gestionFile'];





    public function render()
    {

        $historia = Historia::find($this->idhistoria);
        $this->historiaestado = $historia->estado;

        $lastHistoria = Historia::where('proyecto_id',$historia->proyecto_id)->orderBy('id',"DESC")->first();
        if($lastHistoria->id == $historia->id){
            $this->last = true;
        }

        $presentar = in_array("proyectos.presentar", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $aprobar = in_array("proyectos.aprobar",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $devolver = in_array("proyectos.devolver",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $rechazar = in_array("proyectos.rechazar",auth()->user()->getAllPermissions()->pluck('name')->toArray());


        If ($historia->estado == "Finalizada" && $historia->proyecto->estado == "Revisión") {

            
            $this->authAprobarArchivo = $aprobar ;
            $this->authRechazarArchivo = $devolver;

        }


        if (($historia->estado == "Borrador" or $historia->estado == "Ajustes") and $historia->proyecto->user_id == auth()->user()->id  and  $presentar) {

            $this->disponible = true;
        }




        
        //$tipos = Tiposarchivos::where('grupo','proyecto')->pluck('texto','texto');

        $documentos = $historia->files;


        $tiposdoc = $documentos->pluck('detalle');

        $tipos = array("Seleccione");

        $tipos = array_merge($tipos, Tiposarchivos::where('grupo', 'proyecto')->whereNotIn('texto', $tiposdoc)->orderBy('texto')->pluck('texto', 'texto')->toarray());


        return view('livewire.proyecto.documentos', compact('documentos', 'tipos'));
    }

    public function submit()
    {
        $dataValid = $this->validate([
            'fileTitle' => 'required',
            'fileName' => 'required|max:200000',
        ]);

        $historia = Historia::find($this->idhistoria);

        //$dataValid['fileName'] = $this->fileName->store($historia->proyecto_id, 'public');
        $dataValid['fileName'] = $this->fileName->store('Proyectos/' . $historia->proyecto_id, 'public');







        $historia->files()->create([
            'tipo' => $this->fileName->getMimeType(),
            'detalle' =>  $this->fileTitle,
            'estado' => "Nuevo",
            'url' => $dataValid['fileName']

        ]);


        $this->statusUploadBtn = "disabled";
        $this->classUploadBtn = "bg-white text-gray-300 hover:bbg-gray-500 cursor-not-allowed";

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
            'fileName' => 'required|max:200000',
        ]);

        $this->nombreDoc = $this->fileName->getClientOriginalName();

        $this->statusUploadBtn = "";
        $this->classUploadBtn = "bg-green-700 text-green-100 hover:bg-green-800 border-gray-500";
    }

    public function updatedfileTitle()
    {
        if ($this->fileTitle !== "0" && $this->fileTitle !== null) {
            $this->fileclass = "text-gray-600 hover:text-black cursor-pointer border-gray-500";
            $this->filenabled = "";
        } else {
            $this->fileclass = "cursor-not-allowed";
            $this->filenabled = "disabled";
        }
    }

    public function export($id)
    {


        $doc = File::find($id);

        $hist = $doc->Historias()->first();

        $nombre = "P" . $hist->proyecto_id . "_H" . $hist->id . "_" . $doc->detalle . "_" . $doc->created_at->format('Y-m-d');
        $extension = current(array_reverse(explode('.', $doc->url)));


        return response()->download(storage_path("/app/public/" . $doc->url), $nombre . "." . $extension);
    }

    public function deleteFile($ids)
    {

        $doc = File::find($ids);
        $historia = $doc->Historias()->first();

        $presentar = in_array("proyectos.presentar", auth()->user()->getAllPermissions()->pluck('name')->toArray());

        if (($historia->estado == "Borrador" or $historia->estado == "Ajustes") and $historia->proyecto->user_id == auth()->user()->id  and  $presentar) {


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

    public function gestionFile($ids, $accion)
    {
        $exito = false;
        $doc = File::find($ids);
        $historia = $doc->Historias()->first();

        $aprobar = in_array("proyectos.aprobar",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $devolver = in_array("proyectos.devolver",auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $rechazar = in_array("proyectos.rechazar",auth()->user()->getAllPermissions()->pluck('name')->toArray());

        if ($historia->estado == "Finalizada" && $historia->proyecto->estado == "Revisión" && $doc != null) {
        
            if($accion == "Rechazar" && ($devolver || $rechazar)){

                $doc->estado = "Rechazado";
                $exito = $doc->save();

                if($exito){
                   
                    $this->dispatchBrowserEvent('swal-modal', [
                        'type' => 'success',
                        'title' => 'Archivo rechazado',
                        'text' => '',
                        'confirmButtonColor' => '#d33',
                    ]);
                }else{
                   
                    $this->dispatchBrowserEvent('swal-modal', [
                        'type' => 'error',
                        'title' => 'Imposilbe rechazar el archivo',
                        'text' => '',
                        'confirmButtonColor' => '#d33',
                    ]);
                }

            } elseif($accion == "Aprobar" && $aprobar){

                
                $doc->estado = "Aprobado";
                $exito = $doc->save();

                if($exito){
                  
                    $this->dispatchBrowserEvent('swal-modal', [
                        'type' => 'success',
                        'title' => 'Archivo Aprobado',
                        'text' => '',
                        'confirmButtonColor' => '#0b6e42',
                    ]);
                }
                else{
                   
                    $this->dispatchBrowserEvent('swal-modal', [
                        'type' => 'error',
                        'title' => 'Imposilbe aprobar el archivo',
                        'text' => '',
                        'confirmButtonColor' => '#d33',
                    ]);
                }
            }

        }

        
        return redirect(request()->header('Referer'));



    }
}
