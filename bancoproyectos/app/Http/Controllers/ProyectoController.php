<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('can:proyectos.create')->only('create','store');
       $this->middleware('can:proyectos.edit')->only('edit','update');
       

    }

    public function index(){

        $proyectos = Proyecto::all();

        return view('proyectos.index',compact('proyectos'));

    }


    public function show($proyecto){


        return view('proyectos.show',compact('proyecto'));

    }

    public function create(){

        return view('proyectos.create');

    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:proyectos|max:255',
            'fuente' => 'required',
            'fase' => 'required',
            'valor' => 'required|numeric|min:0',
            'sector' => 'required',
            'tiempo' => 'required|min:1|integer',
           
        ]);

       

        $proyecto = new Proyecto();
        $proyecto->name = $request->name;
        $proyecto->fuente = $request->fuente;
        $proyecto->fase = $request->fase;
        $proyecto->valor = $request->valor;
        $proyecto->sector = $request->sector;
        $proyecto->tiempo = $request->tiempo;
        $proyecto->estado = "Borrador";
        $proyecto->user_id = Auth::id(); 


        $proyecto->save();

        $historia = new Historia();
        $historia->name = $proyecto->name;
        $historia->fuente = $proyecto->fuente;
        $historia->fase = $proyecto->fase;
        $historia->valor = $proyecto->valor;
        $historia->sector = $proyecto->sector;
        $historia->tiempo = $proyecto->tiempo;
        $historia->estado = $proyecto->estado;
        $historia->proyecto_id = $proyecto->id;
       

        $historia->save();

        return redirect()->route('proyectos.show',$proyecto);

    }

    public function edit(Proyecto $proyecto){

        

        return view('proyectos.edit',compact('proyecto'));

    }

    public function update(Request $request,proyecto $proyecto){

        
        $proyecto->name = $request->name;
        $proyecto->fuente = $request->fuente;
        $proyecto->fase = $request->fase;
        $proyecto->valor = $request->valor;
        $proyecto->sector = $request->sector;
        $proyecto->tiempo = $request->tiempo;
        $proyecto->estado = "Ajustes";
        $proyecto->user_id = Auth::id(); 


        $proyecto->save();

        
        $historia = new Historia();
        $historia->name = $proyecto->name;
        $historia->fuente = $proyecto->fuente;
        $historia->fase = $proyecto->fase;
        $historia->valor = $proyecto->valor;
        $historia->sector = $proyecto->sector;
        $historia->tiempo = $proyecto->tiempo;
        $historia->estado = $proyecto->estado;
        $historia->proyecto_id = $proyecto->id;
       

        $historia->save();

        return redirect()->route('proyectos.show',$proyecto);



    }

    public function listado($estado){


       

        return view('proyectos.listado',compact('estado'));

    }

}
