<x-appb-layout>
   
    
       
    <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4 h-5/6">
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'>{{$estado}} </x-slot>
        <x-slot name='boton'>ver todos </x-slot>
        
        @livewire('tables.show-proyectos',['estado' => $estado,'usuario' => Auth::user()->id, ])
    </x-marcotabla>
    <!-- ./Borradores -->


       
  
        
      </div>





    
</x-appb-layout>
