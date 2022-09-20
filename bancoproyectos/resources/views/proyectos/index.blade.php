<x-appb-layout>
   
    
    @livewire('dashboard.resumen',['idusuario' => Auth::user()->id])
    
    <div class="grid grid-cols-1 lg:grid-cols-2 p-2 gap-4 h-tabla3">
    <!-- Borradores -->
  @if($formulador)
  <x-marcotabla>
    <x-slot name='titulo'>Borradores </x-slot>
    <x-slot name='boton'>Ver todos </x-slot>
    <x-slot name='botonAccion'>href="{{route('proyectos.listado', 'Borrador') }}"</x-slot>
    @livewire('tables.show-proyectos',['estado' => 'Borrador','usuario' => Auth::user()->id, ])
</x-marcotabla>
<!-- ./Borradores -->


    <!-- Devuletos -->
    <x-marcotabla>
        <x-slot name='titulo'>Devueltos </x-slot>
        <x-slot name='boton'>Ver todos </x-slot>
        <x-slot name='botonAccion'>href="{{route('proyectos.listado', 'Devuelto') }}"</x-slot>
        @livewire('tables.show-proyectos',['estado' => 'Devuelto','usuario' => Auth::user()->id])
    </x-marcotabla>
    <!-- ./Devuletos -->
  @endif
  @if($evaluador )
    <!-- Devuletos -->
    <x-marcotabla>
        <x-slot name='titulo'>Revisión </x-slot>
        <x-slot name='boton'>Ver todos </x-slot>
        <x-slot name='botonAccion'>href="{{route('proyectos.listado', 'Revisión') }}"</x-slot>
        @livewire('tables.show-proyectos',['estado' => 'Revisión','usuario' => Auth::user()->id])
    </x-marcotabla>
    <!-- ./Devuletos -->
  @endif
  @if($evaluador | $registrador)
  <x-marcotabla>
    <x-slot name='titulo'>Presentados </x-slot>
    <x-slot name='boton'>Ver todos </x-slot>
    <x-slot name='botonAccion'>href="{{route('proyectos.listado', 'Presentado') }}"</x-slot>
    @livewire('tables.show-proyectos',['estado' => 'Presentado','usuario' => Auth::user()->id, ])
</x-marcotabla>
<!-- ./Borradores -->

@endif

  
   
  
        
      </div>





   
</x-appb-layout>
