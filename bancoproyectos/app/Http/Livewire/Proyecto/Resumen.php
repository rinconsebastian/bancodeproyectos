<?php

namespace App\Http\Livewire\Proyecto;

use App\Models\Proyecto;
use App\Models\Revision;
use App\Models\Historia;
use Livewire\WithFileUploads;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Resumen extends Component
{

    use WithFileUploads;
    public $idproyecto;
    public $color;
    public $authpresentar = false;
    public $authaprobar = false;
    public $authrevisar = false;
    public $authdevolver = false;
    public $authcorregir = false;
    public $autheliminar = false;
    public $authrechazar = false;
    public $authregistrar = false;
    public $nombreDoc = "Anexe el registro del banco";
    public $statusUploadBtn = "disabled";
    public $filenabled = "";
    public $fileclass = "text-gray-600 hover:text-black cursor-pointer border-gray-500";
    
    public $classUploadBtn = "bg-gray-100 dark:bg-gray-900 text-gray-300 hover:bbg-gray-500 cursor-not-allowed";
    public $fileTitle, $fileName, $bpin = "999";

    protected $listeners = ['transicion'];

    public function render()
    {
        $presentar = in_array("proyectos.presentar", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $aprobar = in_array("proyectos.aprobar", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $devolver = in_array("proyectos.devolver", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $rechazar = in_array("proyectos.rechazar", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $eliminar = in_array("proyectos.eliminar", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        $registrar = in_array("proyectos.registrar", auth()->user()->getAllPermissions()->pluck('name')->toArray());



        $proyecto = Proyecto::find($this->idproyecto);


        switch ($proyecto->estado) {
            case 'Borrador':
                $this->color = "bg-yellow-500";
                $this->authpresentar = $presentar and auth()->user()->id == $proyecto->user_id;
                $this->autheliminar = $eliminar and auth()->user()->id == $proyecto->user_id;
                break;
            case 'Presentado':
                $this->color = "bg-blue-500";
                $this->authrevisar = $aprobar;
                //$this->authcreardevolucion = $devolver;
                // $this->authrechazar = $rechazar;
                break;

            case 'Registrado':
                    $this->color = "bg-green-800";
                    $this->authregistrar = $registrar;
                    break;

            case 'Revisión':
                $this->color = "bg-blue-800";
                $this->authaprobar = $aprobar;
                $this->authdevolver = $devolver;
                $this->authrechazar = $rechazar;
                break;
            case 'Devuelto':
                $this->color = "bg-yellow-500";
                $this->authcorregir = $presentar and auth()->user()->id == $proyecto->user_id;
                $this->autheliminar = $eliminar and auth()->user()->id == $proyecto->user_id;
                break;
            case 'Ajustes':
                $this->authpresentar = $presentar and auth()->user()->id == $proyecto->user_id;
                $this->color = "bg-yellow-600";
                break;
            case 'Aprobado':
                $this->color = "bg-green-500";
                $this->authregistrar = $registrar;

              

                

                break;
            case 'Rechazado':
                $this->color = "bg-purple-500";
                break;
            case 'Eliminado':
                $this->color = "bg-red-500";
                break;
               
                       
            defaut:
                    $this->color = "bg-yellow-500";
                    break;
        }

        if( $this->bpin === "999" )
        {
        $this->bpin = $proyecto->bpin;
        }
        

        if($this->nombreDoc == "Anexe el registro del banco" and $proyecto->registronombre != "" ){
            $this->nombreDoc = "Remplazar ".$proyecto->registronombre;
        }

        return view('livewire.proyecto.resumen', compact('proyecto'));
    }

    public function transicion($proceso)
    {
        $proyecto = Proyecto::find($this->idproyecto);
        $nuevoEstado = "";


        switch ($proceso) {
            case 'presentar':
                if ($this->authpresentar and ($proyecto->estado == "Borrador" or $proyecto->estado == "Ajustes")) {
                   
                    $historia = Historia::where('proyecto_id', $this->idproyecto)
                    ->orderBy('id', 'DESC')->first();
                    if($historia != null){
                        $files = $historia->files();
                            if($files->count() > 0){
                               


                                $nuevoEstado = "Presentado";
                            }else{
                                session()->flash('error', 'no se pueden presentar proyectos sin archivos');
                            }
                    }  else{
                        session()->flash('error', 'el proyecto no tiene una historia, reporte esta falla técnica');
                    }                  
                    
                    
                }
                break;
            case 'crearrevision';

                if ($this->authrevisar and $proyecto->estado == "Presentado") {
                    $historia = Historia::where('proyecto_id', $this->idproyecto)
                        ->orderBy('id', 'DESC')->first();
                        if($historia != null){
                            $revision = new Revision();
                            $revision->estado = "Borrador";
                            $revision->historia_id = $historia->id;
                        
                            $revision->save();
                            $historia->proyecto->estado = "Revisión";
                            $historia->proyecto->save();
                        
                            return redirect()->route('proyectos.show', $this->idproyecto);
                         } else{
                        session()->flash('error', 'el proyecto no tiene una historia, reporte esta falla técnica');
                    }                       
                        
                } 
                


                break;
            case 'devolver':
                $falla = false;
                $mensaje = "";
                $historias = Historia::where('proyecto_id', $proyecto->id)->get();

                
                foreach ($historias as $historia) {

                    $files = $historia->files()->where('estado','Nuevo');
                                  
                    if($files->count() > 0){
                        $falla = true;
                    $mensaje = "Debe revisar todos los documentos anexos para poder rechazar el proyectos";
                         }
                }

                if($falla == false){
                foreach ($historias as $historia) {
                    $revisiones = Revision::where('historia_id', $historia->id)->where('estado', "Borrador")->get();
                    foreach ($revisiones as $revisionn) {
                        $files = $revisionn->files();
                        if($files->count() > 0 |  $revisionn->detalle != null |$revisionn->detalle != "")
                        {
                            $revisionn->estado = "Finalizada";
                            $revisionn->save();
                        }else{
                            $falla = true;
                            $mensaje = "Escriba una nota o anexe un documento para devolver el proyecto";
                        }
                        
                    }
                }
            }
                if($falla == false){
                $nuevoEstado = "Devuelto";
            }else{
                session()->flash('error',  $mensaje);
            }

                break;
            case 'corregir':

                if ($this->authcorregir and ($proyecto->estado == "Devuelto")) {

                    return redirect()->route('proyectos.edit', ["proyecto" => $this->idproyecto]);
                }
                break;


            case 'aprobar':
                $falla = true;
                $mensaje = "No tiene permiso o el proyecto ya ha sido aprobado";

                if ($this->authaprobar and $proyecto->estado == "Revisión") {
                    
                    $historia = Historia::where('proyecto_id', $this->idproyecto)
                    ->orderBy('id', 'DESC')->first();
                    if($historia != null){
                        $files = $historia->files()->where('estado','Nuevo');
                            if($files->count() > 0){
                                $falla = true;
                                $mensaje = "Debe revisar todos los documentos anexos para poder aprobar el proyectos";
                            }else{
                                $falla = false;
                                
                            }
                    } 
                    
                    if($falla == false){
                    $historias = Historia::where('proyecto_id', $proyecto->id)->get();
                    foreach ($historias as $historia) {
                        $revisiones = Revision::where('historia_id', $historia->id)->where('estado', "Borrador")->get();
                        foreach ($revisiones as $revisionn) {
                            $files = $revisionn->files();
                            if($files->count() > 0 )
                            {
                                $revisionn->estado = "Finalizada";
                                $revisionn->save();
                            }else{
                                $falla = true;
                                $mensaje = "Anexe la ficha de revisón para aprobar el proyecto";
                            }
                            
                        }
                    }
                }



                }

                if($falla == true){
                    session()->flash('error',  $mensaje);
                }else{
                    $nuevoEstado = "Aprobado";
                }


                break;
            case 'rechazar':
                if ($this->authrechazar and $proyecto->estado == "Revisión") {
                  
                   $nuevoEstado = "Rechazado";
                                
                     
                 
                }
                break;
            case 'eliminar':
                if ($this->autheliminar and ($proyecto->estado == "Borrador" or $proyecto->estado == "Ajustes" or $proyecto->estado == "Devuelto")) {
                    $nuevoEstado = "Eliminado";
                }
                break;
        }
        if ($nuevoEstado != "") {
            $proyecto->estado = $nuevoEstado;
            $proyecto->save();

            $revisiones = Revision::leftJoin('historias as historias', 'revisions.historia_id', '=', 'historias.id')
                ->where('historias.proyecto_id', '=', $proyecto->id)
                ->get();

            foreach ($revisiones as &$revision) {
                $revision->estado = "Finalizada";
                $revision->save();
            }


            $historias = Historia::where('historias.proyecto_id', '=', $proyecto->id)
                ->get();

            foreach ($historias as $historia) {
                $historia->estado = "Finalizada";
                $historia->save();
            }
        }

        return redirect()->route('proyectos.show', $proyecto->id);
    }

    public function corregir()
    {

        return redirect()->route('proyectos.edit', ["proyecto" => $this->idproyecto]);
    }

    public function updatedfileName()
    {

//        session()->flash('message', 'anexo');

        $dataValid = $this->validate([
            'fileName' => 'required|max:200000',
        ]);

        $this->nombreDoc = $this->fileName->getClientOriginalName();

        $this->statusUploadBtn = "";
        $this->classUploadBtn = "bg-green-700 text-green-100 hover:bg-green-800 border-gray-500";
    }

    public function submit()
    {
       

        $dataValid = $this->validate([
            
            'fileName' => 'required|max:200000',
            'bpin' => 'required|integer|digits_between:11,20'
        ]);

        $proyecto = Proyecto::find($this->idproyecto);

        //$dataValid['fileName'] = $this->fileName->store($historia->proyecto_id, 'public');
        $dataValid['fileName'] = $this->fileName->store('Proyectos/' . $proyecto->id, 'public');


        $proyecto->registro = $dataValid['fileName'];
        $proyecto->registronombre = $this->fileName->getClientOriginalName();
        $proyecto->bpin = $this->bpin;
        $proyecto->estado = "Registrado";
        $proyecto->save();



       $this->statusUploadBtn = "disabled";
       $this->classUploadBtn = "bg-gray-100 dark:bg-gray-900 text-gray-300 hover:bbg-gray-500 cursor-not-allowed";

        //$this->fileclass = "cursor-not-allowed";
        //$this->filenabled = "disabled";

        $this->fileName = null;
        $this->nombreDoc =   "Remplazar ".$proyecto->registronombre;


        //$this->addError('fileName', 'el campo es requerido');

       session()->flash('message', 'Registro del proyecto actualizado');

    }
}
