<div class="mb-4">
    <div id="accordion-collapse2" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-3 font-medium rtl:text-right text-gray-500 border border-blue-800  focus:ring-gray-200  hover:bg-gray-50gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                <div class="flex items-center gap-4">
                    <span class="text-black font-semibold">Firmadores.-</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{$countFirmadores}}</span>
                </div>

                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden border" aria-labelledby="accordion-collapse-heading-1">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-800 uppercase ">

                    <th scope="col" class="px-6 py-3 font-semibold ">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold ">
                        Cargo
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Fecha de Firma
                    </th>




                </thead>
                <tbody>
                    @foreach ($listaFirmadores as $listaFirmador )
                    <tr class="hover:bg-gray-50">
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            {{$listaFirmador->name}}
                        </td>
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            {{$listaFirmador->nombre_cargo}}
                        </td>
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded  border border-green-400"> {{$listaFirmador->estado}}</span>

                        </td>
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            @if ($listaFirmador->fecha_firma == null)

                            @else
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $listaFirmador->fecha_firma)->format('d/m/Y H:i:s') }}
                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>