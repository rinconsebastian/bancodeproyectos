<x-appb-layout>
   
    
    @livewire('dashboard.resumen',['idusuario' => Auth::user()->id])
    
    <div class="grid grid-cols-1 lg:grid-cols-2 p-2 gap-4 h-tabla3">
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





   
</x-appb-layout>
