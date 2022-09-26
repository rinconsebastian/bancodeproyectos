<x-appbreporte-layout>
   
    
       
    <div class="grid grid-cols-1 lg:grid-cols-1 p-3 gap-2 h-full  dark:bg-gray-700">
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'> reporte </x-slot>
       
        @livewire('proyecto.reporte',['usuario' => Auth::user()->id, ])
    



    </x-marcotabla>
    


       
  
        
      </div>


<!-- ./Borradores 
     
-->
    
</x-appb-layout>
