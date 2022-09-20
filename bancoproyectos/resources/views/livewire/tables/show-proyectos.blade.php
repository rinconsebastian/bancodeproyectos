<div class="overflow-x-auto overflow-y-auto h-full">
    <!-- This example requires Tailwind CSS v2.0+ -->
    
    <div class="px-6 py-2">
        <x-jet-input type="text" wire:model="search" class="w-full" 
            placeholder="Escriba el nombre de un proyecto" />
    </div>

    
        @if ($proyectos->count() > 0)
            <table class="min-w-full divide-y divide-gray-200 h-tabla">
                <thead class="bg-gray-50">
                    <tr>
                        
                        <th scope="col"
                            class="cursor-pointer  px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('id')">
                            Id

                            {{-- Sort--}}
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('name')">
                            Nombre
                           {{-- Sort--}}
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('user_id')">
                            Usuario
                            {{-- Sort--}}
                            @if ($sort == 'user_id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('fuente')">
                            Fuente
                            {{-- Sort--}}
                            @if ($sort == 'fuente')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('valor')">
                            Valor
                            {{-- Sort--}}
                            @if ($sort == 'valor')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer  px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('bpin')">
                            BPIN

                            {{-- Sort--}}
                            @if ($sort == 'bpin')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('sector')">
                            Sector
                            {{-- Sort--}}
                            @if ($sort == 'sector')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        @if ($displayestado == true)
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal"
                            wire:click="order('estado')">
                            Estado
                            {{-- Sort--}}
                            @if ($sort == 'estado')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        @endif
                        <th scope="col" class="relative px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $n = 1;
                    @endphp
                    @foreach ($proyectos as $proyecto)

                        <tr   class="hover:bg-gray-200 cursor-pointer" wire:click="open('{{$proyecto->id}}')">
                            
                            <td class="px-2 py-0 text-gray-500">
                                {{ $proyecto->id }}
                            </td>
                            <td class="px-2 py-0 ">
                                {{ $proyecto->name }}
                            </td>
                            <td class="px-2 py-0">
                                <div class="text-sm text-gray-900">{{ $proyecto->user->dependencia->name }}</div>
                                <div class="text-sm text-gray-500">{{ $proyecto->user->name }}</div>
                            </td>
                            <td class="px-2 py-0 whitespace-nowrap text-sm text-gray-500">
                                {{ $proyecto->fuente }}
                            </td>

                            <td class="px-2 py-0 whitespace-nowrap text-sm text-gray-500">
                                {{ "$" . number_format($proyecto->valor, 2, ',', '.') }}

                            </td>
                            <td class="px-2 py-0 text-gray-500">
                                {{ $proyecto->bpin }}
                            </td>
                            <td class="px-2 py-0 text-sm text-gray-500">
                                {{ $proyecto->sector }}
                            </td>
                           
                            @if ($displayestado == true)
                            <td class="px-2 py-0 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $proyecto->estado }}
                                </span>
                            </td>
                            
                            @endif
                            
                            <td class="px-2 py-0  text-right text-sm font-medium">

                            </td>
                        </tr>
                        @php
                            $n++;
                           
                        @endphp
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>
            <div>
                {{$proyectos->links()}}
            </div>
        @else
            <div class="px-6 py-4 text-gray-400  italic text-center ">No existe ningun proyecto coincidente</div>
        @endif

</div>
