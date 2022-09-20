<x-appb-layout>
   
    
 
    
    <div class="  p-4 gap-4 flex flex-col flex-col-1">
   
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.roles.store']) !!}
                @include('admin.roles.partials.form')

                {!! Form::submit('Crear rol', ['class' =>' btn btn-primary']) !!}
                {!! Form::close() !!}
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
