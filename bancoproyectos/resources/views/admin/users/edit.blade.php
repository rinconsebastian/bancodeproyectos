<x-appb-layout>
   
    
 
    
    <div class="  p-4 gap-4 flex flex-col flex-col-1">
    
        @if(session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card">
          <div class="card-header">Asignar rol</div>
            <div class="card-body">
                <p class="h5">Nombre:</p>
                <p>{{$user->name}}</p>
            
                
                <h2 class="h5">Listado de roles</h2>
                {!! Form::model($user, ['route'=> ['admin.users.update',$user],'method'=>'put']) !!}
                @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
                    
                @endforeach

                {!! Form::submit("Asignar rol", ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
            </div>

        </div>
     




       
  
        
      </div>





   
</x-appb-layout>
