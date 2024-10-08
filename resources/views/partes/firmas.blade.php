@extends('layouts.app')

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
        display: flex !important;

        flex-direction: column !important;

    }

    .select2.select2-container {
        width: 100% !important;
    }

    .select2.select2-container .select2-selection {
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        height: 34px;
        margin-bottom: 15px;
        outline: none !important;
        transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
        color: #333;
        line-height: 32px;
        padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
        background: #f8f8f8;
        border-left: 1px solid #ccc;
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
        height: 32px;
        width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
        background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
        border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
        height: auto;
        min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top: 0;
        height: 32px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
        display: block;
        padding: 0 4px;
        line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
        background-color: #f8f8f8;
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        margin: 4px 4px 0 0;
        padding: 0 6px 0 22px;
        height: 24px;
        line-height: 24px;
        font-size: 18px;
        position: relative;
    }



    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        margin: 0;
        text-align: center;
        color: #e74c3c;
        font-weight: bold;
        font-size: 20px;
    }

    .select2-container .select2-dropdown {
        background: transparent;
        border: none;
        margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
        padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
        outline: none !important;
        border: 1px solid #34495e !important;
        border-bottom: none !important;
        padding: 4px 6px !important;
    }

    .select2-container .select2-dropdown .select2-results {
        padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
        background: #fff;
        border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
        background-color: #3498db;
    }
</style>
@livewireStyles
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('content')
<h1>Configuración del Proceso</h1>
<div class="mt-5 p-3 bg-white max-w-8xl mx-auto sm:px-6 lg:px-8">
    <ol class="flex items-center w-full text-md font-medium text-center text-gray-500sm:text-base">
        <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                Información <span class="hidden sm:inline-flex sm:ms-2">del</span> <span class="hidden sm:inline-flex sm:ms-2">Documento</span>
            </span>
        </li>
        <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                <span class="me-2">2</span>
                Visasion <span class="hidden sm:inline-flex sm:ms-2">y</span> <span class="hidden sm:inline-flex sm:ms-2">Firmas</span>
            </span>
        </li>
        <li class="flex items-center">
            <span class="me-2">3</span>
            Confirmation
        </li>
    </ol>
    <div class="flex flex-col gap-2 w-full">
        <div class="p-3">
            <h1>Visadores</h1>
            <div class="grid grid-cols-2 gap-3 p-4  w-full  bg-white ">
                <div>
                    <h1 class="mb-4 font-bold">Infomación de los Visadores</h1>
                    <form action="{{ route('visador.create') }}" method="POST">
                        @csrf
                        <select class="js-example-basic-multiple w-full p-4" name="visador[]" multiple="multiple">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }} - {{ $user->rut }}
                            </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_archivo" value="{{ $archivo->id}}">
                        <button class="text-sm p-3 border bg-blue-900 text-white" type="submit">Agregar</button>
                    </form>
                </div>
                <div class="">
                    <h1 class="mb-4 font-bold">Listado de los Visadores</h1>
                    <div class="border border-blue-700 p-4">
                        @foreach($visadores as $visador)
                        <div class="flex gap-2 items-center">
                            <form id="delete-form-{{ $visador->id }}" action="{{ route('partes.delete', $visador->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <p class="p-2 capitalize bg-gray-100 mb-1">{{ $visador->name }} - {{ $visador->rut }}</p>
                            <span onclick="event.preventDefault(); document.getElementById('delete-form-{{ $visador->id }}').submit();" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler text-red-600 icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </span>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="p-3">
            <h1>Firmadores</h1>
            <livewire:user-select :id="request()->route('id')" />
        </div>

        <div class="p-3">
            <h1>Visadores</h1>
            <livewire:user-select-visar :id="request()->route('id')" />
        </div>

    </div>
</div>
@endsection
</div>
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener('livewire:load', function() {
        // Inicializa Select2 en la carga
        $('#select2').select2();

        // Actualiza el modelo Livewire cuando cambie el valor de Select2
        $('#select2').on('change', function(e) {
            var data = $('#select2').select2("val");
            this.set('selectedOption', data);
        });

        // Re-inicializa Select2 después de que Livewire procese un mensaje
        Livewire.hook('message.processed', (message, component) => {
            $('#select2').select2();
            $('#select2').on('change', function(e) {
                var data = $('#select2').select2("val");
                this.set('selectedOption', data);
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>