<div>
    <div class="border-b border-gray-200 bg-white">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 border-purple-600" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300" role="tablist">
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
        <div class="hidden p-4 rounded-lg bg-white " id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="relative overflow-x-auto">
                <div class="relative mb-4">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" text-gray-400 icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </div>

                    <input class="p-2 border border-gray-300 rounded-md ps-10 w-1/4 shadow-md" placeholder="Buscar usuario...">
                </div>
                <table class="w-full text-sm bg-white text-left rtl:text-right border text-gray-500 shadow-xl rounded-md">
                    <thead class="text-[12px] text-blue-600 uppercase border-b border-blue-600">

                        <th scope="col" class="px-6 py-3 font-semibold ">
                            Nombre acto
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Tipo de Documento
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Cargo
                        </th>

                        <th scope="col" class="px-6 py-3 font-semibold">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Acciones
                        </th>

                    </thead>
                    <tbody>
                        @foreach ($firmar as $firmars )
                        <tr class="border-b border-blue-200 hover:bg-gray-50 ">
                            <td scope="row" class="px-6 py-2 text-gray-800 ">
                                {{$firmars->descripcion}}
                            </td>
                            <td scope="row" class="px-6 py-2 text-gray-800 ">
                                {{$firmars->nombre_doc}}
                            </td>
                            <td scope="row" class="px-6 py-2 text-gray-800 ">
                                {{$firmars->nombre_cargo}}
                            </td>
                            <td scope="row" class="px-6 py-2 text-gray-800 ">

                                <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded  border border-indigo-400"> {{$firmars->estado}}</span>

                            </td>
                            <td class="flex gap-3 px-6 py-4">
                                <a href="" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-writing">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" />
                                        <path d="M16 7h4" />
                                        <path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3" />
                                    </svg>
                                </a>
                                <a href="" class="flex items-center p-2 bg-blue-900 text-white rounded-sm">
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



                    </tbody>

                </table>
                {{$firmar->links() }}
            </div>
            <div wire:loading>
                <div class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-14 bg-orange-400 text-gray-300 p-1 text-sm rounded-md shadow-lg">
                    Cargando ...
                </div>
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>

    </div>
</div>