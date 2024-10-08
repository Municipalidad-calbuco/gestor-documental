<div>
    <div class="flex gap-3">
        <button class="flex items-center gap-2 p-2 w-[100px] justify-center rounded-sm text-sm shadow-md font-semibold  text-center text-white bg-orange-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cancel">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M18.364 5.636l-12.728 12.728" />
            </svg> Rechazar
        </button>
        <button data-modal-target="progress-modal" data-modal-toggle="progress-modal" class="flex items-center gap-2 p-2 w-[90px] justify-center rounded-sm text-sm shadow-md font-semibold text-center text-white bg-blue-900 hover:bg-blue-800 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-minus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                <path d="M13.5 6.5l4 4" />
                <path d="M16 19h6" />
            </svg>
            Firmar

        </button>

    </div>
    @if($message)
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-2" class="fixed flex items-center w-full max-w-xs p-4 mt-12 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-md top-5 right-5 border border-gray-300" role="alert">
        <div class="flex gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler text-green-400 icons-tabler-outline icon-tabler-rosette-discount-check">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1" />
                <path d="M9 12l2 2l4 -4" />
            </svg>
            <div class="text-sm font-normal ">{{ $message }}</div>
        </div>

    </div>

    @endif



    <div id="progress-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-md shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="progress-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5">
                    <h1 class="font-semibold text-md mb-6">Firmar Documento</h1>
                    @if($message)
                    <p>{{ $message }}</p>

                    @endif
                    @if($fileId)
                    <form wire:submit.prevent="firmar">
                        <div class="bg-yellow-100 p-3">
                            <p>Los datos de la firma son los siguientes Cargo: <strong>{{$cargo}}</strong> y Rut: <strong>{{$rut}}</strong> si son los corrector ingrese el OTP y haga click en "Firmar Documento".</p>
                        </div>

                        <div class="mt-5 ">
                            <div class="flex">
                                <span class="inline-flex items-center px-3 font-semibold text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md ">
                                    OTP
                                </span>
                                <input type="text" wire:model="otp" id="otp" class="rounded-none rounded-e-lg border border-gray-300 text-gray-900  block flex-1 min-w-0 w-full text-md p-2.5">
                            </div>

                            @error('otp') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div class="w-full">
                            <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="flex items-center gap-2 p-2 w-full mt-5 justify-center rounded-sm text-sm shadow-md font-semibold text-center text-white bg-blue-900 hover:bg-blue-800 transition-colors duration-300" {{ $isLoading ? 'disabled' : '' }}>
                                <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-minus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                    <path d="M13.5 6.5l4 4" />
                                    <path d="M16 19h6" />
                                </svg>

                                <svg wire:loading class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span wire:loading.remove class="font-md">Firmar Documento</span>
                                <span wire:loading class="font-md">Firmando documento...</span>
                            </button>
                        </div>

                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>



</div>