<div>
    <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">

        <div class="grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12  p-0 gap-0">

            

            <div class="md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4  p-0 gap-0">
                    <h1
                        class="md:col-span-3 lg:col-span-3 xl:col-span-3 text-3xl sm:text-2xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                        {{ $proyecto->name }}</h1>
                    <h2 class="text-center {{ $color }} text-white rounded-md font-bold pt-1 shadow-lg shadow">
                        {{ $proyecto->estado }}</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 p-0 gap-0 my-10">

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-100"><b>Duración: </b>
                            {{ $proyecto->tiempo }} meses</div>
                    </div>

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-100"><b>Valor: </b>$
                            {{ number_format($proyecto->valor, 2, ',', '.') }}</div>
                    </div>

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                          </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40"><b>Sector: </b>
                            {{ $proyecto->sector }}</div>
                    </div>
                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                          </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40"><b>Fuente de los recursos: </b>
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
