<x-appb-layout>
   
    
       
    <div class="grid grid-cols-1 lg:grid-cols-1 p-3 gap-2 h-full dark:bg-gray-700">
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'>{{$estado}} </x-slot>
        <x-slot name='boton'>ver todos </x-slot>
        
        @livewire('tables.show-proyectos',['estado' => $estado,'usuario' => Auth::user()->id, ])
    </x-marcotabla>
    <!-- ./Borradores -->


       
  
        
      </div>





    
</x-appb-layout>
