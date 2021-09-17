<x-appb-layout>
   
    
    @livewire('dashboard.resumen',['idusuario' => Auth::user()->id])
    
    <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4 h-5/6">
    <!-- Borradores -->
    <x-marcotabla>
        <x-slot name='titulo'>Borradores </x-slot>
        <x-slot name='boton'>Ver todos </x-slot>
        @livewire('tables.show-proyectos',['estado' => 'Borrador','usuario' => Auth::user()->id, ])
    </x-marcotabla>
    <!-- ./Borradores -->


        <!-- Devuletos -->
        <x-marcotabla>
            <x-slot name='titulo'>Devueltos </x-slot>
            <x-slot name='boton'>Ver todos </x-slot>
            @livewire('tables.show-proyectos',['estado' => 'Ajustes','usuario' => Auth::user()->id])
        </x-marcotabla>
        <!-- ./Devuletos -->
  
        
      </div>





    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                
                
               
            </div>
        </div>
    </div>
</x-appb-layout>
