<x-appb-layout>




    <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">

        @livewire('proyecto.resumen',['idproyecto' => $proyecto])

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">

        @livewire('proyecto.historias',['idproyecto' => $proyecto])

    </div>

    

</x-appb-layout>
