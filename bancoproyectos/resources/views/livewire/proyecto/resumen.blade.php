<div>
    <div class="p-3 mr-1 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">

        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4  p-0 gap-0 mb-2">
                    <h1
                        class="md:col-span-3 lg:col-span-3 xl:col-span-3 text-3xl sm:text-2xl text-black dark:text-white font-bold tracking-tight uppercase">
                        {{ $proyecto->name }}</h1>
                    <h2 class="text-center {{ $color }} text-white rounded-md font-bold pt-1 shadow-lg ">
                        {{ $proyecto->estado }}</h2>
                </div>
                <ul class=" w-6/12 flex mb-0 list-none flex-wrap pt-1 pb-1 flex-row">
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center cursor-pointer">
                        <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-blue-900"
                            onclick="changeAtiveTab(event,'tab-profile')">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">General</span>

                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center  cursor-pointer">
                        <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-blue-900 bg-white"
                            onclick="changeAtiveTab(event,'tab-settings')">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Documentos aprobados</span>


                        </a>
                    </li>

                </ul>
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-1 shadow-lg rounded">
                    <div class="px-4 py-1 flex-auto">
                        <div class="tab-content tab-space">
                            <div class="block" id="tab-profile">
                                <div
                                    class="grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12  p-0 gap-0">



                                    <div class="md:col-span-9 lg:col-span-10 xl:col-span-11 ">

                                        <div
                                            class="grid grid-cols-2 md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 p-0 gap-0 my-5">

                                            <div class="grid items-center mt-4 text-gray-600 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class=" text-black h-10 w-full"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                                <span
                                                    class=" text-md tracking-normal text-center font-semibold w-100">Duración
                                                </span>
                                                <span
                                                    class="text-md  tracking-normal text-center font-semibold w-100">{{ $proyecto->tiempo }}
                                                    meses </span>

                                            </div>

                                            <div class="grid items-center mt-4 text-gray-600 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class=" text-black h-10 w-full"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span
                                                    class="text-md  tracking-normal text-center font-semibold w-full">Valor</span>
                                                <span
                                                    class=" tracking-normal text-center">${{ number_format($proyecto->valor, 2, ',', '.') }}</span>

                                            </div>

                                            <div class="grid items-center mt-4 text-gray-600 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="  text-black h-10 w-full"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                                </svg>
                                                <span
                                                    class="text-md  tracking-normal text-center font-semibold w-full">Sector</span>
                                                <span
                                                    class=" tracking-normal text-center">{{ $proyecto->sector }}</span>

                                            </div>
                                            <div class="grid items-center mt-4 text-gray-600 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class=" text-black h-10 w-full"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <span
                                                    class=" text-md  tracking-normal text-center font-semibold w-full">Fuente
                                                    de los recursos</span>
                                                <span
                                                    class=" tracking-normal text-center">{{ $proyecto->fuente }}</span>
                                            </div>
                                            <div class="grid items-center mt-4 text-gray-600 dark:text-gray-400">
                                                @if (false)
                                                    <svg class="  h-10 w-full" version="1.1" width="24px" height="24px"
                                                        id="Layer_1" stroke="#ffffff" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 512 512"
                                                        style="enable-background:new 0 0 512 512; color:#ffffff"
                                                        stroke-width="10" xml:space="preserve">
                                                        <path
                                                            d="M307.34,0H115.2a64,64,0,0,0-64,64V448a64,64,0,0,0,64,64H396.8a64,64,0,0,0,64-64V153.6ZM411.49,140.8H358.4A38.44,38.44,0,0,1,320,102.4V49.08ZM435.2,448a38.44,38.44,0,0,1-38.4,38.4H115.2A38.44,38.44,0,0,1,76.8,448V64a38.44,38.44,0,0,1,38.4-38.4H294.4v76.8a64,64,0,0,0,64,64h76.8ZM153.6,256a12.8,12.8,0,0,1,12.8-12.8H268.8a12.8,12.8,0,0,1,0,25.6H166.4A12.8,12.8,0,0,1,153.6,256Zm204.8,51.2A12.8,12.8,0,0,1,345.6,320H166.4a12.8,12.8,0,0,1,0-25.6H345.6A12.8,12.8,0,0,1,358.4,307.2ZM358,358.4a12.8,12.8,0,0,1-12.8,12.8H166.4a12.8,12.8,0,0,1,0-25.6H345.22A12.8,12.8,0,0,1,358,358.4Z" />
                                                    </svg>
                                                   
                                                @else
                                                <svg class="  h-10 w-full" version="1.1" width="24px" height="24px"
                                                        id="Layer_1" stroke="#ffffff" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 512 512"
                                                        style="enable-background:new 0 0 512 512; color:#ffffff"
                                                        stroke-width="10" xml:space="preserve">
                                                        <path
                                                            d="M307.34,0H115.2a64,64,0,0,0-64,64V448a64,64,0,0,0,64,64H396.8a64,64,0,0,0,64-64V153.6ZM411.49,140.8H358.4A38.44,38.44,0,0,1,320,102.4V49.08ZM435.2,448a38.44,38.44,0,0,1-38.4,38.4H115.2A38.44,38.44,0,0,1,76.8,448V64a38.44,38.44,0,0,1,38.4-38.4H294.4v76.8a64,64,0,0,0,64,64h76.8ZM153.6,256a12.8,12.8,0,0,1,12.8-12.8H268.8a12.8,12.8,0,0,1,0,25.6H166.4A12.8,12.8,0,0,1,153.6,256Zm204.8,51.2A12.8,12.8,0,0,1,345.6,320H166.4a12.8,12.8,0,0,1,0-25.6H345.6A12.8,12.8,0,0,1,358.4,307.2ZM358,358.4a12.8,12.8,0,0,1-12.8,12.8H166.4a12.8,12.8,0,0,1,0-25.6H345.22A12.8,12.8,0,0,1,358,358.4Z" />
                                                    </svg>
                                                    <span class=" tracking-normal text-center text-gray-300">Proyecto sin registro</span>    
                                                @endif
                                               
                                                    
                                                
                                             
                                                @if ($authregistrar )




                                                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                                                        <div
                                                            class="grid grid-cols-12 text-xs bg-white dark:bg-gray-600  dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 cursor-pointer">



                                                            <div class="col-span-12">
                                                                <div class=" w-full items-center justify-center ">
                                                                    <div x-data="{ isUploading: false, progress: 0 }"
                                                                        x-on:livewire-upload-start="isUploading = true"
                                                                        x-on:livewire-upload-finish="isUploading = false"
                                                                        x-on:livewire-upload-error="isUploading = false"
                                                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                                        <label
                                                                            class="w-full flex  text-center items-center px-2 py-2 text-gray-100 bg-white {{ $fileclass }}  text-blue rounded-lg tracking-normal border border-blue">
                                                                            <svg class="w-6 h-6 mr-2"
                                                                                fill="currentColor"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 20 20">
                                                                                <path
                                                                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                                                            </svg>
                                                                            <span
                                                                                class="mt-2 text-xs truncate leading-3">{{ $nombreDoc }}</span>
                                                                            <input type='file' class="hidden" {{ $filenabled }}
                                                                                
                                                                                wire:model="fileName" />
                                                                            @error('fileName') <span
                                                                                    class="text-danger error">{{ $message }}</span>
                                                                            @enderror
                                                                            <!-- Progress Bar -->
                                                                            <div x-show="isUploading">
                                                                                <progress max="100"
                                                                                    x-bind:value="progress"></progress>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-span-12">




                                                                <button type="submit" {{ $statusUploadBtn }}
                                                                    class=" border-gray-100 focus:shadow-outline h-full {{ $classUploadBtn }} font-bold py-2 px-4 rounded inline-flex items-center w-full">
                                                                    <svg class="w-4 h-4 mr-2 fill-current text-white"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                                                    </svg>
                                                                    <span class="text-center items-center">Adjuntar</span>
                                                                </button>



                                                            </div>


                                                        </div>
                                                    </form>
                                                @endif


                                            </div>
                                        </div>

                                    </div>



                                    <div
                                        class=" grid right-0 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-1 p-0 gap-0 alig">

                                        <div class="grid ">
                                            @if ($authpresentar)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','presentar','Presentar ','#3b82f6')"
                                                    class=" bg-blue-500 dark:bg-gray-100 h-10 text-white active:bg-blue-600 hover:bg-blue-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Presentar</button>
                                            @endif
                                            @if ($authaprobar)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','aprobar','Aprobar ','#10b981')"
                                                    class="  bg-green-500 dark:bg-gray-100 h-10 text-white active:bg-green-600 hover:bg-green-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Aprobar</button>
                                            @endif

                                            @if ($authcreardevolucion)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','creardevolucion','Devolver ','#d97706')"
                                                    class="  bg-yellow-500 dark:bg-gray-100 h-10 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Devolver</button>
                                            @endif
                                            @if ($authdevolver)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','devolver','Enviar devolución d','#d97706')"
                                                    class="  bg-yellow-500 dark:bg-gray-100 h-10 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Enviar devolición</button>
                                            @endif
                                            @if ($authcorregir)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','corregir','Corregir ','#d97706')"
                                                    class="  bg-yellow-500 dark:bg-gray-100 h-10 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Corregir</button>
                                            @endif
                                            @if ($authrechazar)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','rechazar','Rechazar ','#7c3aed')"
                                                    class="  bg-purple-500 dark:bg-gray-100 h-10 text-white active:bg-purple-600 hover:bg-purple-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Rechazar</button>
                                            @endif
                                            @if ($autheliminar)
                                                <button
                                                    @click="transicion('{{ $proyecto->id }}','eliminar','Eliminar ','#dc2626')"
                                                    class="  bg-red-500 dark:bg-gray-100 h-10 text-white active:bg-red-600 hover:bg-red-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Eliminar</button>
                                            @endif
                                        </div>


                                    </div>




                                </div>
                            </div>
                            <div class="hidden" id="tab-settings">
                                @livewire('proyecto.documentosaprobados',['idproyecto' => $proyecto->id])
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function changeAtiveTab(event, tabID) {
                let element = event.target;
                while (element.nodeName !== "A") {
                    element = element.parentNode;
                }
                ulElement = element.parentNode.parentNode;
                aElements = ulElement.querySelectorAll("li > a");
                tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
                for (let i = 0; i < aElements.length; i++) {
                    aElements[i].classList.remove("text-white");
                    aElements[i].classList.remove("bg-blue-900");
                    aElements[i].classList.add("text-blue-900");
                    aElements[i].classList.add("bg-white");
                    tabContents[i].classList.add("hidden");
                    tabContents[i].classList.remove("block");
                }
                element.classList.remove("text-blue-900");
                element.classList.remove("bg-white");
                element.classList.add("text-white");
                element.classList.add("bg-blue-900");
                document.getElementById(tabID).classList.remove("hidden");
                document.getElementById(tabID).classList.add("block");
            }
        </script>
















    </div>


</div>
<script>
    function transicion(id, accion, texto, color) {
        if (id != null) {
            icono = "warning";
            if (accion == "presentar" || accion == "aprobar") {
                icono = 'success';
            } else if (accion == "iniciardevolucion" || accion == "devolver" || accion == "corregir") {
                icono = 'warning'
            } else if (accion == "rechazar" || accion == "eliminar") {
                icono = 'error'
            }
            Swal.fire({
                title: "",
                text: '¿Está seguro que desea ' + texto + 'el proyecto?',
                icon: icono,
                showCancelButton: true,
                confirmButtonColor: color,
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, ' + texto
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit("transicion", accion);

                    //Swal.fire(
                    //    'Deleted!',
                    //    'Your file has been deleted.',
                    //    'success'
                    //)
                }

            });


        }
    }
</script>
