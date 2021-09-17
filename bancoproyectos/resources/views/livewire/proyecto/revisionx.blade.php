<div>
   
    @if ($revision != null)
           <div class="rounded bg-gray-100 dark:bg-gray-800 p-3">



            <div class="flex justify-between py-1 text-black dark:text-white">
                <h3 class="text-sm font-semibold">Revisión {{ $revision->created_at }}</h3>
                <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z">
                    </path>
                </svg>
            </div>
            <div class="text-sm text-black dark:text-gray-50 mt-2">
                <h3 class="text-sm font-semibold">Observaciones</h3>
                <div
                    class="grid grid-cols-1  bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 ">


                    @if ($editrevision == true)
                        <textarea wire:model.lazy="detalle" name="detalle" id="detalle"> </textarea>
                    @else
                        <p>{{ $revision->detalle }}</p>
                    @endif

                </div>
                <h3 class="text-sm font-semibold">Documentos</h3>
                @livewire('proyecto.documentos-revisionx',['idRevision' => $revision->id,'edit'=>$editrevision])
            </div>


        </div>

    
          
       
           
    @endif

</div>
