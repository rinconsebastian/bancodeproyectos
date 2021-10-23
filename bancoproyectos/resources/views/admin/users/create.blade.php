<x-appb-layout>




    <div class="  p-4 gap-4 flex flex-col flex-col-1">

        <div class="card">

            <div class="card-body">
                <h2 class="card-title h3">Crear usuario</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.users.store']) !!}
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
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseńa del usuario' , 'autocomplete'=> 'new-password']) !!}
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('password2', 'Verifique la ontraseńa') !!}
                        {!! Form::password('password2', ['class' => 'form-control', 'placeholder' => 'Verifique la contraseńa del usuario' , 'autocomplete'=> 'new-password']) !!}
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <br><br>
                    <hr>

                    <h2 class="h4">Dependencia</h2>

                    
                    <div class="form-group">
                        {!! Form::label('dependencia', 'Dependencia') !!}
                        {!! Form::select('dependencia',$dependencias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione la dependencia del usuario']) !!}
                        @error('passdependenciaword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                           
                       
                   

                    <br><br>
                    <hr>

                    <h2 class="h4">Roles</h2>

                    @foreach ($roles as $rol)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']) !!}
                                {{ $rol->name }}
                            </label>
                        </div>
                    @endforeach



                    {!! Form::submit('Crear usuario', ['class' => ' btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>






    </div>





    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">




            </div>
        </div>
    </div>
</x-appb-layout>
