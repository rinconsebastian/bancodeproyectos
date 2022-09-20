@php
    if($open == "true"){
        $estilocabecera  ="bg-gray-200 hover:bg-gray-300 dark:bg-gray-800 text-black";
    }
    else{
        $estilocabecera  ="bg-gray-100 hover:bg-gray-100 dark:bg-gray-800 text-gray-500 text-xs";
    }
@endphp
<div>

    <div x-data="{animate:{{$open}}}" class="mt-0 mb-1 " >

        <div @click="animate = (animate) ? false : true"
            class="cursor-pointer  grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 {{$estilocabecera}} sm:rounded-sm mr-0  px-3  pt-0 pb-2">

            <div class="md:col-span-2 lg:col-span-2 xl:col-span-2">
                <h2 class="text-sm font-bold ">Versión {{ $n }}</h2>
            </div>
            <div class="md:col-span-2 lg:col-span-2 xl:col-span-2">
                <h2 class="text-sm"><b>Duración:</b> {{ $historia->tiempo }} meses</h2>
            </div>
            <div class="md:col-span-3 lg:col-span-3 xl:col-span-3">
                <h2 class="text-sm"><b>Valor:</b> $ {{ number_format($historia->valor, 2, ',', '.') }}</h2>
            </div>
            <div class="md:col-span-2 lg:col-span-2 xl:col-span-2">
                <h2 class="text-sm"><b>Fuente:</b> {{ $historia->fuente }}</h2>
            </div>

            <div class="md:col-span-3 lg:col-span-3 xl:col-span-3">
                <h3 class="text-sm font-semibold float-right">{{ $historia->created_at }}</h3>
               

            </div>

        </div>
        <div x-show="animate" 
            x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-100 transform origin-top scale-y-0" 
            x-transition:enter-end="opacity-100 transform origin-top scale-y-100" 
            x-transition:leave="transition ease-in duration-300" 
            x-transition:leave-start="opacity-100 transform origin-top scale-y-100" 
            x-transition:leave-end="opacity-100 transform origin-top scale-y-0" 
            class="  px-4 py-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 p-4 gap-4 text-black dark:text-white pt-1" >
            <div class="md:col-span-2 xl:col-span-1">
                @livewire('proyecto.documentos',['idhistoria' => $historia->id])
            </div>
            <div>

                @livewire('proyecto.revisionx',['idhistoria' => $historia->id])
            </div>

        </div>
    </div>




</div>
