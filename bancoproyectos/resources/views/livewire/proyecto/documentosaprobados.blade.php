<div>
    {{-- The best athlete wants his opponent at his best. --}}
@php
    $n = 0;
@endphp

<ul class="grid 2xl:grid-cols-3 lg:grid-cols-2 grid-cols-1 gap-0">
    @foreach ($files as $file)
    @php
    $extension = current(array_reverse(explode('.', $file->last()->url)));
    $n++;
    @endphp
    <li class="text-xs">
        
        @if (($extension == 'pdf') | ($extension == 'jpeg') | ($extension == 'jpg') | ($extension == 'png'))
                        <a title="{{$n}}. {{$file->last()->detalle}}" href="/public/storage/{{ $file->last()->url }}" target="_blank" class=" text-xs cursor-pointer  relative flex flex-row items-center h-8 transition duration-500 transform ease-in-out hover:bg-gray-200">
                            <x-iconofile type="{{$file->last()->tipo}}" size="24" />
                            <span class="ml-2 text-sm tracking-normal truncate">{{$n}}. {{$file->last()->detalle}}  </span>      
                        </a>
                    @else
                        <a  title="{{$n}}. {{$file->last()->detalle}}" wire:click="export('{{ $file->last()->id }}')"  class="text-xs cursor-pointer  relative flex flex-row items-center h-8 transition duration-500 ease-in-out transform hover:bg-gray-200">
                            <x-iconofile type="{{$file->last()->tipo}}" size="24" />
                         <span  class="ml-2 text-sm tracking-normal truncate">{{$n}}. {{$file->last()->detalle}}</span>       
                        </a>
                    @endif
        
        
        
        </li>
   

 
    @endforeach
</ul>
    
</div>
