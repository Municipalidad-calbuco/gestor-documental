<div>




    <div class="flex gap-3">
        <button class="flex items-center gap-2 p-2 w-[100px] justify-center rounded-sm text-sm shadow-md font-semibold  text-center text-white bg-orange-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cancel">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M18.364 5.636l-12.728 12.728" />
            </svg> Rechazar
        </button>
        <button wire:click="visar" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="flex items-center gap-2 p-2 w-[90px] justify-center rounded-sm text-sm shadow-md font-semibold text-center text-white bg-blue-900 hover:bg-blue-800 transition-colors duration-300" {{ $this->yaVisado ? 'disabled' : '' }}>
            <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler font-semibold icons-tabler-outline icon-tabler-check">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l5 5l10 -10" />
            </svg>
            <svg wire:loading class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span wire:loading.remove>{{ $this->yaVisado ? 'Visado' : 'Visar' }}</span>
            <span wire:loading>Visando...</span>
        </button>
        @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-2" class="fixed flex items-center w-full max-w-xs p-4 mt-12 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-md top-5 right-5 border border-gray-300" role="alert">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler text-green-400 icons-tabler-outline icon-tabler-rosette-discount-check">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1" />
                    <path d="M9 12l2 2l4 -4" />
                </svg>
                <div class="text-sm font-normal ">{{ session('message') }}</div>
            </div>

        </div>
        @endif
    </div>

    <div class=" mt-10">
        <ul class="flex flex-col gap-6">
            @foreach ($dato as $datos )
            <li class="grid grid-cols-3 gap-2 border-b">
                <p class="font-bold">
                    Nombre del proceso:
                </p>
                <p class=" col-span-2">{{$datos->descripcion}}</p>
            </li>
            <li class="grid grid-cols-3  gap-2 border-b">
                <p class="font-bold">
                    Tipo de documento:
                </p>
                <span class=" col-span-2">{{$datos->nombre_doc}}</span>
            </li>
            <li class="grid grid-cols-3  gap-2 border-b">
                <p class="font-bold">
                    Usuario Creador:
                </p>
                <span class=" col-span-2">{{$datos->name}}</span>
            </li>
            <li class="grid grid-cols-3  gap-2 border-b">
                <p class="font-bold">
                    Dependencia:
                </p>
                <span class=" col-span-2">{{$datos->nombre_oficina}}</span>
            </li>
            <li class="grid grid-cols-3  gap-2 border-b">
                <p class="font-bold">
                    Fecha de Creación:
                </p>

                <span class=" col-span-2"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $datos->fecha_inicio)->format('d/m/Y H:i:s') }}</span>
            </li>
            <li class="grid grid-cols-3  gap-2 border-b">
                <p class="font-bold">
                    Nombre del Archivo:
                </p>
                <span class=" col-span-2">{{$datos->nombre_archivo}}</span>
            </li>
            @endforeach

        </ul>
    </div>


</div>