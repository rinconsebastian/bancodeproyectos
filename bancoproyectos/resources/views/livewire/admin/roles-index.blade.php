<div class="overflow-x-auto overflow-y-auto h-full">
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="px-6 py-2">
        <x-jet-input type="text" wire:model="search" class="w-full"
            placeholder="Escriba el nombre del rol" />
    </div>


    @if ($roles->count() > 0)
        <table class="min-w-full divide-y divide-gray-200  h-tabla">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        N


                    </th>
                    
                    <th scope="col"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        wire:click="order('name')">
                        Nombre
                        {{-- Sort --}}
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
                    


                    <th scope="col" class="relative px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $n = 1;
                @endphp
                @foreach ($roles as $rol)

                    <tr class="hover:bg-gray-200 ">
                        <td class="px-2 py-4 text-gray-500">
                            {{ $n }}
                        </td>
                       
                        <td class="px-2 py-4 ">
                            {{ $rol->name }}
                        </td>
                       




                        <td class="px-2 py-4  text-right text-sm font-medium" width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit',$rol)}}">Editar</a>
                            
                            
                        </td>
                        <td  width="10px">
                            <form action="{{route('admin.roles.destroy',$rol)}}" method="POST">
                                @method('DELETE')
                                @csrf  
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
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
            {{$roles->links()}}
        </div>
    @else
        <div px 6 py-4>No existe ningun rol coincidente</div>
    @endif

</div>
