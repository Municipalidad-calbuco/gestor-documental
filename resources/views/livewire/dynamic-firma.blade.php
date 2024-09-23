<div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @foreach($inputs as $key => $value)
    <div class="flex gap-5  mb-3 w-full">
        <div class="w-full ">
            <div class="mb-4">
                <label class="font-bold" for="">Firmador {{ $key }}</label>
            </div>
            <div class="grid grid-cols-4 items-center gap-3 w-full ">
                <div class="col-md-3 col-sm-6 mb-3 select-px-15 pl-30 pr-15" wire:ignore>
                    <label for="user_id{{ $key }}" class="il-gray fs-14 fw-500 align-center">{{ __("Usuario") }}</label>
                    <select wire:model="user_id" id="user_id{{ $key }}" class="select2 form-control ih-medium ip-light radius-xs b-light {{ $errors->has('user_id') ? ' is-invalid' : null }}">
                        <option value="">{{ __("Selecciona un usuario") }}</option>
                        @if(count($users) > 0)
                        @foreach ($users as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error("user_id")<div class="invalid-feedback">{{ $errors->first("user_id") }}</div>@enderror
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    window.initSelect2 = () => {
        jQuery("#user_id").select2({
            minimumResultsForSearch: 2,
            allowClear: true
        });
    }

    initSelect2();
    window.livewire.on('select2', () => {
        initSelect2();
    });
</script>