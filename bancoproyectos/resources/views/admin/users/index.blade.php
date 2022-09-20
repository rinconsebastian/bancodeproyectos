<x-appb-layout>
   
    
 
    
    <div class="h-full  p-3 gap-4 flex flex-col flex-col-1">
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'>Lista de usuarios </x-slot>
        @if($crear)
        <x-slot name='botonAccion'>href="{{route('admin.users.create') }}"</x-slot>
        <x-slot name='boton'>Nuevo usuario</x-slot>
        @endif
    @livewire('admin.users-index')
        
    </x-marcotabla>
    <!-- ./Borradores -->

       
  
        
      </div>





  
</x-appb-layout>
