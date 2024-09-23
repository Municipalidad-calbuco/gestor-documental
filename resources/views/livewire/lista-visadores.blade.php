<div class=" mt-4">



    <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-3 font-medium rtl:text-right text-gray-500 border border-blue-800  focus:ring-gray-200  hover:bg-gray-50gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
                <div class="flex items-center gap-4">
                    <span class=" text-black font-semibold">Visadores.-</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{$countVisadores}}</span>
                </div>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden border" aria-labelledby="accordion-collapse-heading-1">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-800 uppercase ">

                    <th scope="col" class="px-6 py-3 font-semibold ">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Fecha de Visado
                    </th>




                </thead>
                <tbody>
                    @foreach ($listaVisadores as $listaVisador )
                    <tr class="hover:bg-gray-50">
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            {{$listaVisador->name}}
                        </td>
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            {{$listaVisador->estado}}
                        </td>
                        <td scope="row" class="px-6 py-4 text-gray-800 ">
                            @if ($listaVisador->fecha_visacion == null)

                            @else
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $listaVisador->fecha_visacion)->format('d/m/Y H:i:s') }}
                            @endif


                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>