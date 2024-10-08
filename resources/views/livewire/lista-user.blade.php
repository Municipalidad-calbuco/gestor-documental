<div>
    <div class="p-3">

        <div class="relative mb-4">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" text-gray-400 icon icon-tabler icons-tabler-outline icon-tabler-search">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </div>

            <input class="p-2 border border-gray-300 rounded-md ps-10 w-1/4 shadow-md" placeholder="Buscar usuario..." wire:model.live="search">
        </div>

        <table class="w-full text-sm bg-white text-left rtl:text-right border text-gray-500 shadow-xl rounded-md">
            <thead class="text-[12px] text-blue-600 uppercase border-b border-blue-600 ">
                <th scope="col" class="px-6 py-3 font-semibold ">
                    Nombre Usuario
                </th>
                <th scope="col" class="px-6 py-3 font-semibold ">
                    Rut
                </th>
                <th scope="col" class="px-6 py-3 font-semibold ">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3 font-semibold ">
                    acciones
                </th>
            </thead>
            <tbody>
                @foreach ( $users as $user)
                <tr class="border-b border-blue-200 hover:bg-gray-50 ">
                    <td scope="row" class="flex gap-3 items-center px-6 py-4 text-gray-800 "><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                            <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                        </svg>
                        {{$user->name}}
                    </td>
                    <td scope="row" class="px-6 py-2 text-gray-800 ">{{$user->rut}}</td>
                    @if ($user->estado == 'Activo')
                    <td scope="row" class="px-6 py-2 ">
                        <span class="bg-green-500 border-green-500  text-white  text-xs font-medium me-2 px-2.5 py-0.5 rounded  border ">{{$user->estado}}</span>
                    </td>
                    @else
                    <td scope="row" class="px-6 py-2  ">
                        <span class="bg-red-700  text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-700">{{$user->estado}}</span>
                    </td>
                    @endif
                    <td scope="row" class="flex gap-2 px-6 py-2 ">
                        <a href="" data-tooltip-target="tooltip-default{{$user->id}}" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        </a>
                        <a href="" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <div id="tooltip-default{{$user->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Ver detalle
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                @endforeach

            </tbody>
        </table>
        <div class="mt-4">
            {{ $users ->links() }}
        </div>

    </div>

</div>