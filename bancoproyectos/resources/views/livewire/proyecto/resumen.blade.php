<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
    <div class="p-0 mr-1 bg-gray-100 dark:bg-gray-800 sm:rounded-lg card">

        <div class="flex flex-wrap " id="tabs-id">
            <div class="w-full">
                <div class="py-1 px-3 grid text-xs grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4  p-0 gap-0 mb-2 card-header">
                    <h1
                        class="md:col-span-3 lg:col-span-3 xl:col-span-3 text-lg sm:text-lg lg:text-2xl xl:text-2xl text-black dark:text-white font-bold tracking-tight uppercase">
                        {{ $proyecto->name }}</h1>
                    <h2 class="text-center {{ $color }} text-white rounded-md font-bold pt-1 shadow-lg ">
                        {{ $proyecto->estado }}</h2>
                </div>
                <ul class="px-3 sm:w-full lg:w-full xl:w-8/12 flex mb-0 list-none flex-wrap pt-1 pb-1 flex-row">
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center cursor-pointer">
                        <a class="text-xs font-bold uppercase sm:px-1 sm:text-base lg:px-5 py-1 shadow-lg rounded block leading-normal text-white bg-blue-900"
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
                        <a class="text-xs font-bold uppercase lg:px-5 sm:px-1 sm:text-base py-1 shadow-lg rounded block leading-normal text-blue-900 bg-white"
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
                <div class="ml-4 mr-4 mb-3 relative flex flex-col min-w-0 break-words bg-white  shadow-lg rounded">
                    <div class="px-0 py-1 flex-auto">
                        <div class="tab-content tab-space">
                            <div class="block" id="tab-profile">
                                <div
                                    class="grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12  p-0 gap-0">



                                    <div class="md:col-span-9 lg:col-span-10 xl:col-span-11 ">

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 p-0 gap-0 my-5">

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
                                            <div class="grid items-center mt-4 dark:text-gray-400">
                                                @if ($proyecto->registro != "")
                                                <a class="w-full" href="/public/storage/{{$proyecto->registro}}" target="_blank">

                                                <svg class="  h-10 w-full" version="1.1" width="24px" height="24px"
                                                id="Layer_1" stroke="#ffffff" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512; color:green"
                                                stroke-width="0" xml:space="preserve">
                                                <path
                                                    d="M482.6,250.4l18.1-18.1c15-15,15-39.3,0-54.3c-15-15-39.3-15-54.3,0l-36.9,36.9v-61.3L256.1,0H64 C28.7,0,0,28.7,0,64v384c0,35.3,28.7,64,64,64h281.6c35.3,0,64-28.7,64-64V323.5l55-55l9,9l-18.1,18.1c-5.1,4.9-5.2,13-0.3,18.1 c4.9,5.1,13,5.2,18.1,0.3c0.1-0.1,0.2-0.2,0.3-0.3l27.2-27.2c5-5,5-13.1,0-18.1L482.6,250.4z M268.8,49.1l91.5,91.7h-53.1 c-21.2,0-38.4-17.2-38.4-38.4L268.8,49.1z M384,448c0,21.2-17.2,38.4-38.4,38.4H64c-21.2,0-38.4-17.2-38.4-38.4V64 c0-21.2,17.2-38.4,38.4-38.4h179.2v76.8c0,35.3,28.7,64,64,64c0,0,0,0,0,0H384v74.1L265.4,359c-11.5,11.5-14.5,29-7.4,43.6l-1.1,1.1 c-13.8-14.8-27.3-21.3-40.9-19.6c-13,1.6-20.8,10-27.1,16.8c-4.7,5.1-7.8,8.3-11.3,8.8c-1.5-0.1-5.5-4.6-7.9-7.4 c-5.9-7-14-16.5-27.5-18.2c-16.7-2-33,8-50.1,30.6c-4.4,5.6-3.4,13.6,2.2,18c5.6,4.4,13.6,3.4,18-2.2c0.1-0.1,0.2-0.2,0.3-0.3 c10.5-13.9,20.2-21.5,26.7-20.6c3.2,0.4,6.5,3.9,11,9.3c6,7,14,16.5,27,16.5c1.1,0,2.3-0.1,3.4-0.2c13-1.6,20.8-10,27.1-16.8 c4.8-5.2,7.8-8.3,11.3-8.8c6.4-0.9,16.1,6.8,26.7,20.6c2.4,3.1,6.1,5,10.1,5c0.2,0,0.5,0,0.7,0h0.5c3.2-0.1,6.2-1.5,8.4-3.7 l10.7-10.7c14.6,7.2,32.2,4.2,43.6-7.4l64.4-64.3V448z M301.6,395.2c-5,5-13.1,5-18.1,0l0,0c-5-5-5-13.1,0-18.1l144.8-144.8 l18.1,18.1L301.6,395.2z M464.5,232.3l-3.3-3.3l-14.8-14.8l18.1-18.1c1-0.9,2.1-1.7,3.3-2.3c1.1-0.6,2.3-1,3.5-1.2 c0.7-0.1,1.5-0.2,2.2-0.2c0.8,0,1.5,0.1,2.3,0.3c1.5,0.3,2.9,0.8,4.2,1.5c6.1,3.6,8.1,11.5,4.4,17.6c-0.5,0.9-1.2,1.7-1.9,2.5 L464.5,232.3z M89.6,192c0-7.1,5.7-12.8,12.8-12.8c0,0,0,0,0,0h77.2c7.1,0,12.8,5.7,12.8,12.8s-5.7,12.8-12.8,12.8h-77.2 C95.3,204.8,89.6,199.1,89.6,192L89.6,192z M89.6,243.2c0-7.1,5.7-12.8,12.8-12.8c0,0,0,0,0,0h154c7.1,0,12.8,5.7,12.8,12.8 s-5.7,12.8-12.8,12.8h-154C95.3,256,89.6,250.3,89.6,243.2z" />
                                            </svg>
                                        </a>
                                            <a class="w-full text-center" href="/public/storage/{{$proyecto->registro}}" target="_blank">
                                                    <span class=" tracking-normal text-center text-black font-bold">Registro cargado</span>
                                                </a>
                                                <a class="w-full text-center" href="/public/storage/{{$proyecto->registro}}" target="_blank">
                                                    <span class=" tracking-normal text-center text-black font-bold">Proyecto {{$proyecto->id}}</span> 
                                                </a>   
                                                @else
                                                <svg class="  h-10 w-full" version="1.1" width="24px" height="24px"
                                                        id="Layer_1" stroke="#ffffff" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 512 512"
                                                        style="enable-background:new 0 0 512 512; color:#ffffff"
                                                        stroke-width="20" xml:space="preserve">
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
                                                    @click="transicion('{{ $proyecto->id }}','devolver','Enviar devolución ','#d97706')"
                                                    class="  bg-yellow-500 dark:bg-gray-100 h-12 text-white active:bg-yellow-600 hover:bg-yellow-700 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                    type="button">Enviar devolución</button>
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
