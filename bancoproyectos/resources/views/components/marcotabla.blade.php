<div class="relative h-full flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded card">
    <div class="rounded-t mb-0 px-0 border-0 h-full">
        <div class="card-header flex flex-wrap items-center px-4 py-2">
            <div class=" w-full max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">{{$titulo??''}}</h3>
            </div>
            <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                @if(isset($botonAccion))
                    
               
                <a
                {{$botonAccion??''}}
                    class=" text-white bg-blue-500 active:bg-blue-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">{{ $boton??''}}</a> @endif
            </div>
        </div>
        <div class="block w-full h-tabla2 ">
            {{$slot}} 
        </div>
    </div>
</div>
