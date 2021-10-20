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
    public $authcreardevolucion = false;
    public $authdevolver = false;
    public $authcorregir = false;
    public $autheliminar = false;
    public $authrechazar = false;
    public $authregistrar = false;
    public $nombreDoc = "Seleccione un archivo";
    public $statusUploadBtn = "disabled";
    public $filenabled = "";
    public $fileclass = "text-gray-600 hover:text-black cursor-pointer border-gray-500";
    
    public $classUploadBtn = "bg-white text-gray-300 hover:bbg-gray-500 cursor-not-allowed";
    

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
                $this->authaprobar = $aprobar;
                $this->authcreardevolucion = $devolver;
                $this->authrechazar = $rechazar;
                break;

            case 'Revisión':
                $this->color = "bg-blue-800";
                $this->authdevolver = $devolver;
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


        return view('livewire.proyecto.resumen', compact('proyecto'));
    }

    public function transicion($proceso)
    {



        $proyecto = Proyecto::find($this->idproyecto);
        $nuevoEstado = "";


        switch ($proceso) {
            case 'presentar':
                if ($this->authpresentar and ($proyecto->estado == "Borrador" or $proyecto->estado == "Ajustes")) {
                    $nuevoEstado = "Presentado";
                }
                break;
            case 'creardevolucion';

                if ($this->authcreardevolucion and $proyecto->estado == "Presentado") {
                    $historia = Historia::where('proyecto_id', $this->idproyecto)
                        ->orderBy('id', 'DESC')->first();

                    $revision = new Revision();
                    $revision->estado = "Borrador";
                    $revision->historia_id = $historia->id;

                    $revision->save();
                    $historia->proyecto->estado = "Revisión";
                    $historia->proyecto->save();

                    return redirect()->route('proyectos.show', $this->idproyecto);
                }

                break;
            case 'devolver':
                $historias = Historia::where('proyecto_id', $proyecto->id)->get();
                foreach ($historias as $historia) {
                    $revisiones = Revision::where('historia_id', $historia->id)->where('estado', "Borrador")->get();
                    foreach ($revisiones as $revisionn) {
                        $revisionn->estado = "Finalizada";
                        $revisionn->save();
                    }
                }
                $nuevoEstado = "Devuelto";
                break;
            case 'corregir':

                if ($this->authcorregir and ($proyecto->estado == "Devuelto")) {

                    return redirect()->route('proyectos.edit', ["proyecto" => $this->idproyecto]);
                }
                break;
            case 'aprobar':
                if ($this->authaprobar and $proyecto->estado == "Presentado") {
                    $nuevoEstado = "Aprobado";
                }
                break;
            case 'rechazar':
                if ($this->authrechazar and $proyecto->estado == "Presentado") {
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
        $dataValid = $this->validate([
            'fileName' => 'required|max:200000',
        ]);

        
        $this->statusUploadBtn = "";
        $this->classUploadBtn = "bg-green-700 text-green-100 hover:bg-green-800 border-gray-500";
    }
}
