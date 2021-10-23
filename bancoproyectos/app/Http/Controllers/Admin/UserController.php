<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('can:admin.users.edit')->only('edit');
       $this->middleware('can:admin.users.update')->only('update');
       $this->middleware('can:admin.users.index')->only('index');
       $this->middleware('can:admin.users.create')->only('create','store');
       

    }


    public function index()
    {
        $crear = in_array("admin.users.create", auth()->user()->getAllPermissions()->pluck('name')->toArray());
        
        
        //
        return view('admin.users.index',compact('crear'));
    }

   
    public function create()
    {

        $roles = Role::all();
        $dependencias = Dependencia::all()->pluck('name','id');
        return view('admin.users.create',compact('roles','dependencias'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|required_with:password2|same:password2',
            'password2' => 'min:6',
            'dependencia' => 'required',

        ]);

      
        // create user
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
            'remember_token' => "asfsrtertr"

        ];
        
       // return $userData;
        $user = User::create($userData);
        $user->dependencia_id =$request->dependencia;
        $user->save();
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit',$user)->with('info','El usuario se creo con exito');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        

       
        $dependencias = Dependencia::all()->pluck('name','id');
        $roles = Role::all();

        return view('admin.users.edit',compact('user','roles','dependencias'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required_with:password2|same:password2',
            'dependencia' => 'required',

        ]);

        $respuesta = "Se actualizó el usuario correctamente";

        $user->name = $request->name;
        $user->email = $request->email;
        $user->dependencia_id =$request->dependencia;

        if(strlen($request->password) > 0){
            $user->password =   bcrypt($request->password);
            $respuesta = "Se actualizaron el usuario y la contraseńa correctamente";
        }
        


        $user->save();
        $user->roles()->sync($request->roles);
    return redirect()->route('admin.users.edit',$user)->with('info',$respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
