<div>
   
    @if ($revision != null)
           <div class="rounded bg-gray-100 dark:bg-gray-800 p-3">



            <div class="flex justify-between py-1 text-gray-900 dark:text-gray-100 dark:text-white">
                <h3 class="text-sm font-semibold">Revisión {{ $revision->created_at }}</h3>
                
            </div>
            <div class="text-sm text-gray-900 dark:text-gray-100 dark:text-gray-50 mt-2">
                <h3 class="text-sm font-semibold">Observaciones</h3>
                <div
                    class="grid grid-cols-1  bg-gray-100 dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 ">


                    @if ($editrevision == true)
                        <textarea wire:model.lazy="detalle" name="detalle" id="detalle"> </textarea>
                    @else
                        <p class="">{{ $revision->detalle }}</p>
                    @endif

                </div>
                <h3 class="text-sm font-semibold">Documentos</h3>
                @livewire('proyecto.documentos-revisionx',['idRevision' => $revision->id,'edit'=>$editrevision])
            </div>


        </div>

    
          
       
           
    @endif

</div>
