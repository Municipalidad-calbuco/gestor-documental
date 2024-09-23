<div class="p-3">

    <div class="grid grid-cols-2 gap-3">
        <div class="flex gap-3">
            <div class="relative mb-4">
                <button wire:click="toggleUserDropdown" class="flex items-center justify-between p-2.5 text-sm ih-medium ip-light border border-gray-300 w-[310px] rounded-md shadow-md b-light">
                    {{ $selectedUserName ?: 'Seleccionar usuario' }}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                @if($isUserOpen)
                <div class="absolute z-10 w-full mt-1 bg-white divide-y divide-gray-100 rounded-lg shadow">
                    <ul class="p-3 text-sm text-gray-700 border border-gray-300 rounded-md">
                        <div class="flex items-center mb-2">
                            <input type="text" wire:model.live="userSearch" class="form-input w-full text-sm border border-gray-300 rounded-md" placeholder="Buscar Usuario..." />
                        </div>
                        @foreach ($this->filteredUsers as $user)
                        <li wire:key="user-{{ $user->id }}" wire:click="selectUser({{ $user->id }})" class="flex flex-col mt-3 p-2 cursor-pointer hover:bg-gray-200 {{ $selectedUserId == $user->id ? 'bg-blue-100' : '' }}" value="{{ $user->id }}">
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->rut }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <!-- Cargo Dropdown -->
            <div class="relative">
                <button wire:click="toggleCargoDropdown" class="flex items-center justify-between p-2.5 text-sm ih-medium ip-light border border-gray-300 w-[310px] rounded-md shadow-md b-light" {{ !$selectedUserId ? 'disabled' : '' }}>
                    {{ $selectedCargoName ?: 'Seleccionar cargo' }}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                @if($isCargoOpen && $selectedUserId)
                <div class="absolute z-10 w-full mt-1 bg-white divide-y divide-gray-100 rounded-lg shadow">
                    <ul class="p-3 text-sm text-gray-700 border border-gray-300 rounded-md">
                        <div class="flex items-center mb-2">
                            <input type="text" wire:model.live="cargoSearch" class="form-input w-full text-sm border border-gray-300 rounded-md" placeholder="Buscar Cargo..." />
                        </div>
                        @foreach ($this->filteredCargos as $cargo)
                        <li wire:key="cargo-{{ $cargo->id }}" wire:click="selectCargo({{ $cargo->id }})" class="mt-3 p-2 cursor-pointer hover:bg-gray-200 {{ $selectedCargoId == $cargo->id ? 'bg-blue-100' : '' }}" value="{{ $cargo->id }}">
                            {{ $cargo->nombre_cargo }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="p-3 border border-gray-200 rounded-md shadow-md">
            @foreach ($firmador as $firmadores)
            <div class="grid grid-cols-4 gap-4 items-center mb-5">
                <div class=" col-span-2">
                    <p class="font-bold"> {{ $firmadores->name }}</p>
                    <p class="text-sm"> {{$firmadores->nombre_cargo}}</p>

                </div>
                <div class=" col-span-2 text-center">
                    <button wire:click="destroy({{$firmadores->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7h16" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            <path d="M10 12l4 4m0 -4l-4 4" />
                        </svg>
                    </button>

                </div>

            </div>
            @endforeach


            <!-- Agrega más campos según sea necesario -->
        </div>
    </div>



    <form wire:submit.prevent="save">
        <div>
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
        <input type="hidden" wire:model="id_usuario">

        <input type="hidden" wire:model="id_cargo">

        <button class="text-sm p-3 border bg-blue-900 text-white font-bold" type="submit">Guardar Firmador</button>
        <div wire:loading>
            <div class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-14 bg-orange-400 text-gray-300 p-1 text-sm rounded-md shadow-lg">
                Cargando ...
            </div>
        </div>
    </form>
</div>