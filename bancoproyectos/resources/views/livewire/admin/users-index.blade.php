<div class="overflow-x-auto overflow-y-auto h-full">
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="px-6 py-2">
        <x-jet-input type="text" wire:model="search" class="w-full"
            placeholder="Escriba el nombre del usuario" />
    </div>


    @if ($users->count() > 0)
        <table class="min-w-full divide-y divide-gray-200 h-tabla">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        N


                    </th>
                    <th scope="col"
                        class="cursor-pointer  px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        wire:click="order('id')">
                        Id

                        {{-- Sort --}}
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
                    <th scope="col"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        wire:click="order('email')">
                        Email
                        {{-- Sort --}}
                        @if ($sort == 'email')
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
            <tbody class="bg-white divide-y divide-gray-200 text-xs">
                @php
                    $n = 1;
                @endphp
                @foreach ($users as $user)

                    <tr class="hover:bg-gray-200 ">
                        <td class="px-2 py-0 text-gray-500">
                            {{ $n }}
                        </td>
                        <td class="px-2 py-0 text-gray-500">
                            {{ $user->id }}
                        </td>
                        <td class="px-2 py-0 ">
                            {{ $user->name }}
                        </td>
                        <td class="px-2 py-0">
                            {{ $user->email }}
                        </td>




                        <td class="px-2 py-0  text-right text-sm font-medium">
                            <a class="btn btn-primary btn-sm py-0" href="{{route('admin.users.edit',$user)}}">Editar</a>
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
            {{$users->links()}}
        </div>
    @else
        <div px 6 py-4>No existe ningun usuqa coincidente</div>
    @endif

</div>
