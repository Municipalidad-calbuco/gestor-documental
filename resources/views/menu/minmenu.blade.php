<div class="p-2 border border-gray-200 bg-white rounded-lg shadow-lg w-[300px] h-[250px]">
    <h5 class="text-sm font-semibold ">Menú</h5>
    <div class="flex flex-col gap-3">
        <ul class=" mt-2 p-4 space-y-2 text-sm">
            <li>
                <a href="/proceso/visador" class="flex gap-2 justify-between items-center p-2 rounded-lg text-black group  @if(request()->routeIs('partes.create')) bg-gray-300 @endif">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        <span class="ms-3 font-semibold text-[12px]">Visadores</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="" class="flex gap-2 justify-between items-center p-2 rounded-lg text-black   group  @if(request()->routeIs('formulario.identificaciones')) bg-gray-300 @endif">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 14l11 -11" />
                            <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                        </svg>
                        <span class="ms-3 font-semibold text-[12px]">Distribucion</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/proceso/archivo" class="flex gap-2 justify-between items-center p-2 rounded-lg text-black   group  @if(request()->routeIs('partes.archivo')) bg-gray-300 @endif">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-doc">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                            <path d="M5 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                            <path d="M20 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" />
                            <path d="M12.5 15a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1 -3 0v-3a1.5 1.5 0 0 1 1.5 -1.5z" />
                        </svg>
                        <span class="ms-3 font-semibold text-[12px]">Config. Documento</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>