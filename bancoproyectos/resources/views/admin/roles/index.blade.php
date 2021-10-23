<x-appb-layout>
   
    
 
    
    <div class="h-full  p-3 gap-4 flex flex-col flex-col-1">

        @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
            
        @endif
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'>Lista de roles </x-slot>
        @if($crear)
        <x-slot name='botonAccion'>href="{{route('admin.roles.create') }}"</x-slot>
        <x-slot name='boton'>Nuevo rol</x-slot>
        @endif        

        @livewire('admin.roles-index')
        
    </x-marcotabla>
    <!-- ./Borradores -->


       
  
        
      </div>





   
</x-appb-layout>
