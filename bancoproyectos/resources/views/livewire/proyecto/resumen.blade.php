<div>
    <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">

        <div class="grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12  p-0 gap-0">

            <div class="md:col-span-5 lg:col-span-4 xl:col-span-2 mx-auto">
                <img src="https://media.istockphoto.com/vectors/linear-icon-of-three-highrise-buildings-vector-id942920180?b=1&k=6&m=942920180&s=612x612&w=0&h=F5eSqYkr1aY1_5JMmz901L7HhZd-rVamv54ls5TPANc="
                    alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
            </div>

            <div class="md:col-span-7 lg:col-span-8 xl:col-span-10 ">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4  p-0 gap-0">
                    <h1
                        class="md:col-span-3 lg:col-span-3 xl:col-span-3 text-3xl sm:text-2xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                        {{ $proyecto->name }}</h1>
                    <h2 class="text-center {{ $color }} text-white rounded-md font-bold pt-1 shadow-lg shadow">
                        {{ $proyecto->estado }}</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 p-0 gap-0 my-10">

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-100"><b>Duración: </b>
                            {{ $proyecto->tiempo }} meses</div>
                    </div>

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-100"><b>Valor: </b>$
                            {{ number_format($proyecto->valor, 2, ',', '.') }}</div>
                    </div>

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40"><b>Sector: </b>
                            {{ $proyecto->sector }}</div>
                    </div>
                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40"><b>Fuente: </b>
                            {{ $proyecto->fuente }}</div>
                    </div>
                </div>





                <div
                    class=" grid grid-cols-1 inset-y-0 right-0 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 p-0 gap-0 alig">

                    <div class="flex justify-center md:justify-end xl:justify-end lg:justify-end">
                        @if ($authpresentar)
                            <button wire:click="transicion('{{ $proyecto->id }}','presentar')"
                                class=" bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 hover:bg-blue-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button">Presentar</button>
                        @endif
                        @if ($authaprobar)
                        <button wire:click="transicion('{{ $proyecto->id }}','aprobar')"
                            class="  bg-green-500 dark:bg-gray-100 text-white active:bg-green-600 hover:bg-green-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">Aprobar</button>
                            @endif
                        @if ($authcreardevolucion)    
                        <button wire:click="transicion('{{ $proyecto->id }}','creardevolucion')"
                            class="  bg-yellow-500 dark:bg-gray-100 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">Devolver</button>
                            @endif
                            @if ($authdevolver)    
                            <button wire:click="transicion('{{ $proyecto->id }}','devolver')"
                                class="  bg-yellow-500 dark:bg-gray-100 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button">Enviar devolición</button>
                                 @endif
                                 @if ($authcorregir)    
                                 <button wire:click="transicion('{{ $proyecto->id }}','corregir')"
                            class="  bg-yellow-500 dark:bg-gray-100 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">Corregir</button>
                            @endif
                            @if ($authrechazar)    
                        <button wire:click="transicion('{{ $proyecto->id }}','rechazar')"
                            class="  bg-purple-500 dark:bg-gray-100 text-white active:bg-purple-600 hover:bg-purple-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">Rechazar</button>
                            @endif
                            @if ($autheliminar)    
                        <button wire:click="transicion('{{ $proyecto->id }}','eliminar')"
                            class="  bg-red-500 dark:bg-gray-100 text-white active:bg-red-600 hover:bg-red-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">Eliminar</button>
                            @endif
                    </div>


                </div>


            </div>

        </div>

    </div>


</div>
