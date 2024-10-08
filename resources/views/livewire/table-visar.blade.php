<div>
    <div class="border border-gray-200 bg-white shadow-sm">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-blue-600 font-semibold hover:text-blue-600 border-blue-600" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300" role="tablist">
            <li class="me-2" role="presentation">
                <button class="relative inline-flex  p-4 border-b-2 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Entrada
                    <span class="sr-only">Notifications</span>
                    <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">{{$countFirmar}}</div>
                </button>

            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Finalizados</button>
            </li>

            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Rechazados</button>
            </li>

        </ul>
    </div>
    <div id="default-styled-tab-content">
        <div class="hidden p-4 bg-white shadow-md" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">


            <div class="relative overflow-x-auto">
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

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Nombre acto
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Tipo de Documento
                        </th>

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Acciones
                        </th>

                    </thead>
                    <tbody>
                        @if ($visar->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-2 text-black text-center text-sm font-medium">No hay documentos para visar</td>
                        </tr>
                        @else
                        @foreach ($visar as $visars)
                        <tr>
                            <td scope="row" class="px-6 py-2">
                                {{ $visars->descripcion ?? 'N/A' }}
                            </td>
                            <td scope="row" class="px-6 py-2">
                                {{ $visars->nombre_doc ?? 'N/A' }}
                            </td>
                            <td scope="row" class="px-6 py-2">
                                @if ($visars->estado)
                                <span class="bg-yellow-300 text-white font-semibold text-xs me-2 px-2.5 py-0.5 rounded border border-yellow-300">
                                    {{ $visars->estado }}
                                </span>
                                @else
                                <span class="text-gray-500">Sin estado</span>
                                @endif
                            </td>
                            <td class="flex gap-3 px-6 py-2">
                                <a href="{{ $visars->id ? '/proceso/visar/'.$visars->id : '#' }}" class="flex items-center p-2 bg-blue-900 text-white rounded-sm {{ !$visars->id ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-exclamation-circle">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 9v4" />
                                        <path d="M12 16v.01" />
                                    </svg>
                                </a>
                                <button type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M13 5h8" />
                                        <path d="M13 9h5" />
                                        <path d="M13 15h8" />
                                        <path d="M13 19h5" />
                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif


                    </tbody>

                </table>
            </div>
            <div wire:loading>
                <div class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-14 bg-orange-400 text-gray-300 p-1 text-sm rounded-md shadow-lg">
                    Cargando ...
                </div>
            </div>
        </div>
        <div class="hidden p-4  bg-white shadow-md" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="relative overflow-x-auto">
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
                <table class="w-full text-sm bg-white text-left  rtl:text-right border text-gray-800 shadow-xl rounded-md">
                    <thead class="text-[12px] text-blue-600 uppercase border-b border-blue-600 ">

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Nombre acto
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Tipo de Documento
                        </th>

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Fecha de Visación
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Acciones
                        </th>

                    </thead>
                    <tbody>
                        @if ($finalizados->isEmpty())
                        <tr class="">
                            <td colspan="4" class="px-6 py-2 text-black text-center text-sm font-medium">No hay documentos Finalizados</td>
                        </tr>
                        @else
                        @foreach ($finalizados as $finalizado )
                        <tr>
                            <td scope="row" class="px-6 py-2 font-medium ">
                                {{$finalizado->descripcion}}
                            </td>
                            <td scope="row" class="px-6 py-2 font-medium ">
                                {{$finalizado->nombre_doc}}
                            </td>
                            <td scope="row" class="px-6 py-2 ">
                                <span class="bg-green-500 text-white font-semibold text-xs  me-2 px-2.5 py-0.5 rounded border border-green-500"> {{$finalizado->estado}}</span>

                            </td>
                            <td scope="row" class="px-6 py-2 font-medium ">

                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $finalizado->fecha_visacion)->format('d/m/Y H:i:s') }}


                            </td>
                            <td class="flex gap-3 px-6 py-2">
                                <a href="" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M13 5h8" />
                                        <path d="M13 9h5" />
                                        <path d="M13 15h8" />
                                        <path d="M13 19h5" />
                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        @endif


                    </tbody>

                </table>

            </div>
        </div>
        <div class="hidden p-4  bg-white shadow-md" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
            <div class="relative overflow-x-auto">
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

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Nombre acto
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Tipo de Documento
                        </th>

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Fecha de Rechazo
                        </th>

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Acciones
                        </th>

                    </thead>
                    <tbody>
                        @if ($rechazo->isEmpty())
                        <tr class="">
                            <td colspan="4" class="px-6 py-2 text-black text-center text-sm font-medium">No hay documentos rechazados</td>
                        </tr>
                        @else
                        @foreach ($rechazo as $rechazos )
                        <tr>
                            <td scope="row" class="px-6 py-2 ">
                                {{$rechazos->descripcion}}
                            </td>
                            <td scope="row" class="px-6 py-2 ">
                                {{$rechazos->nombre_doc}}
                            </td>
                            <td scope="row" class="px-6 py-2 ">
                                <span class="bg-red-500 text-white font-semibold text-xs  me-2 px-2.5 py-0.5 rounded border border-red-500"> {{$finalizado->estado}}</span>

                            </td>
                            <td scope="row" class="px-6 py-2 ">

                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rechazos->fecha_visacion)->format('d/m/Y H:i:s') }}


                            </td>
                            <td class="flex gap-3 px-6 py-2">
                                <a href="" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M13 5h8" />
                                        <path d="M13 9h5" />
                                        <path d="M13 15h8" />
                                        <path d="M13 19h5" />
                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>