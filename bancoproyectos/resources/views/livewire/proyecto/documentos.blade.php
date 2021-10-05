<div>

    <div class="rounded bg-gray-100 dark:bg-gray-800 p-3">
        <div class="flex justify-between py-1 text-black dark:text-white">
            <h3 class="text-sm font-semibold">Documentos</h3>
            <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z">
                </path>
            </svg>
        </div>
        <div class="text-sm text-black dark:text-gray-50 mt-2">
            @foreach ($documentos as $documento)
                @php
                    $extension = current(array_reverse(explode('.', $documento->url)));
                @endphp

                <div
                    class="grid grid-cols-12  bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 ">

                    <div class="col-span-10 ">
                        @if ($disponible == true)
                        <span class=" text-red-700 hover:text-red-500 inline-block cursor-pointer "
                            @click="alertaBorrar({{ $documento }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        @endif
                        <span class="inline-block pl-6 cursor-default">{{ $documento->detalle }}</span>
                    </div>
                    @if (($extension == 'pdf') | ($extension == 'jpeg') | ($extension == 'jpg') | ($extension == 'png'))
                        <div class="col-span-2"><a
                                class="float-right cursor-pointer text-green-600 hover:text-green-400"
                                href="/public/storage/{{ $documento->url }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg></a></div>
                    @else
                        <div class="col-span-2"><a
                                class="float-right cursor-pointer text-green-600 hover:text-green-400"
                                wire:click="export('{{ $documento->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg></a></div>
                    @endif



                </div>

            @endforeach
            @if ($disponible == true)
                <div class="flex justify-between py-1 text-black dark:text-white">
                    <h3 class="text-sm font-semibold">Agregar documento</h3>
                    <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z">
                        </path>
                    </svg>
                </div>

                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                    <div
                        class="grid grid-cols-12  bg-white dark:bg-gray-600  dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 cursor-pointer">

                        <div class="col-span-4 pr-1">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="relative inline-block w-full h-full text-gray-700">
                                {!! Form::select('fileTitle', $tipos, null, ['wire:model' => 'fileTitle', 'class' => 'w-full h-full pl-3 pr-6 text-base cursor-pointer border-gray-500 hover:text-black text-gray-600  placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input']) !!}
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('fileTitle') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6">
                            <div class=" w-full items-center justify-center ">
                                <div x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <label
                                        class="w-full flex  text-center items-center px-4 py-2 text-gray-100 bg-white {{ $fileclass }}  text-blue rounded-lg tracking-wide border border-blue">
                                        <svg class="w-8 h-8 mr-2" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-base leading-normal">{{ $nombreDoc }}</span>
                                        <input type='file' class="hidden" {{ $filenabled }}
                                            wire:model="fileName" />
                                        @error('fileName') <span class="text-danger error">{{ $message }}</span>
                                        @enderror
                                        <!-- Progress Bar -->
                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2">




                            <button type="submit" {{ $statusUploadBtn }}
                                class="float-right  border-gray-100 focus:shadow-outline h-full {{ $classUploadBtn }} font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg class="w-4 h-4 mr-2 fill-current text-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                </svg>
                                <span>Adjuntar</span>
                            </button>



                        </div>


                    </div>
                </form>
            @endif

        </div>
    </div>



    <script>
        window.addEventListener('swal-modal', event =>{
            
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                confirmButtonColor : event.detail.confirmButtonColor,
            });

        });
        
        
        function alertaBorrar(doc) {
            if (doc != null) {
                Swal.fire({
                    title: doc.detalle,
                    text: '¿Está seguro que desea borrar el archivo, no podrá recuperarlo?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, Borrarlo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit("deleteFile", doc.id);

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


</div>
