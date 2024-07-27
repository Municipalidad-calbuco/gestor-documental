<div>
    @foreach($inputs as $key => $value)
    <div class="flex gap-5  mb-3 w-full">
        <div class="w-full ">
            <div class="mb-4">
                <label class="font-bold" for="">Firmador {{ $key }}</label>
            </div>
            <div class="grid grid-cols-4 items-center gap-3 w-full ">
                <div class="col-span-2 w-full">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="inputs.{{ $key }}">
                </div>
                <div class="col-span-1 w-full">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="inputs.{{ $key }}">
                </div>

                <div class=" col-span-1">
                    <button wire:click="removeInput({{ $key }})" class="flex items-center gap-2 font-bold text-red-600 underline ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10l4 4m0 -4l-4 4" />
                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                        </svg>Eliminar
                    </button>
                </div>
            </div>

        </div>
    </div>
    @endforeach


    <button wire:click="addInput" class="flex items-center gap-2 font-bold text-blue-500 underline">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
            <path d="M9 12h6" />
            <path d="M12 9v6" />
        </svg>Agregar Firmador
    </button>
</div>