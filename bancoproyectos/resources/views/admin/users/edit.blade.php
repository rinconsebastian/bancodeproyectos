<x-appb-layout>
   
    
 
    
    <div class="  p-4 gap-4 flex flex-col flex-col-1">
    
        @if(session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card">
          <div class="card-header">Editar usuario {{$user->name}}</div>
            <div class="card-body">
                
            
                
               
                {!! Form::model($user, ['route'=> ['admin.users.update',$user],'method'=>'put']) !!}
               

                @csrf
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los nombres y apellidos del usuario']) !!}
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del usuario']) !!}
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseńa') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Solo ingrese la contraseńa si desea actualizarla' , 'autocomplete'=> 'new-password']) !!}
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password2', 'Verifique la contraseńa') !!}
                    {!! Form::password('password2', ['class' => 'form-control', 'placeholder' => 'solo verifique la contraseńa si desea actualizarla' , 'autocomplete'=> 'new-password']) !!}
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <br><br>
                <hr>

                <h2 class="h4">Dependencia</h2>

                
                <div class="form-group">
                    {!! Form::label('dependencia', 'Dependencia') !!}
                    {!! Form::select('dependencia',$dependencias, $user->dependencia_id, ['class' => 'form-control', 'placeholder' => 'Seleccione la dependencia del usuario']) !!}
                    @error('passdependenciaword')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                       
                   
               

                <br><br>
                <hr>

                <h2 class="h4">Roles</h2>


               
               
                @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
                    
                @endforeach

                {!! Form::submit("Actualizar usuario", ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
            </div>

        </div>
     




       
  
        
      </div>





   
</x-appb-layout>
