@include('menu.menu')
@livewireStyles
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="p-4 sm:ml-64 bg-gray-100 h-full">
    <div class="mt-14">
        <h1>Configuración del Proceso</h1>
        <div class="flex gap-5 mt-5 max-w-8xl mx-auto sm:px-6 lg:px-8">
            @include('menu.minmenu')
            <div class="flex flex-col gap-4 w-full">
                <div class="flex flex-col gap-2 ">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
                            <h1 class="font-bold">Información</h1>
                            <div class="mt-4">
                                <label for="" class="font-bold">Nombre del Proceso:</label>
                                <p>{{ $proceso->descripcion }}</p>
                            </div>
                            <div class="mt-4">
                                <label for="" class="font-bold">Nombre del Proceso:</label>
                                <p>{{ $proceso->descripcion }}</p>
                            </div>
                        </div>
                        <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
                            <h1 class="font-bold mb-4">Archivo</h1>
                            <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_proceso" value="{{ $proceso->id }}">
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="file" accept="application/pdf">
                                <button class="flex items-center gap-2 text-sm p-3 border bg-blue-900 text-white" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-upload">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                        <path d="M7 9l5 -5l5 5" />
                                        <path d="M12 4l0 12" />
                                    </svg> Subir archivo</button>
                            </form>
                            <div class="flex gap-2">
                                <p class="flex gap-2 items-center"><a data-modal-target="ver-archivo" data-modal-toggle="ver-archivo" type="botton" class="flex gap-2 items-center cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-red-600 icon-tabler icons-tabler-outline icon-tabler-file-type-pdf">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                            <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                                            <path d="M17 18h2" />
                                            <path d="M20 15h-3v6" />
                                            <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                                        </svg> {{ $archivo->nombre_archivo }} </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 p-4 shadow-lg w-full border  bg-white border-gray-200 rounded-lg">
                        <div>
                            <h1 class="mb-4 font-bold">Infomación de los Visadores</h1>
                            <form action="{{ route('visador.create') }}" method="POST">
                                @csrf
                                <select wire:model="selectedUserIds" class="js-example-basic-multiple w-full p-4" name="visador[]" multiple="multiple">
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
                                <p class="p-2 capitalize bg-gray-100 mb-1"> {{$visador->name}} - {{$visador->rut}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" flex flex-col gap-2 ">

                    <div class=" p-4 shadow-lg w-full border bg-white border-gray-200 rounded-lg">
                        <h1 class="mb-4 font-bold">Infomación de los Firmadores</h1>
                        <livewire:dynamic-firma />
                    </div>

                </div>
            </div>


        </div>

    </div>

</div>
@include('modal.ver_archivo');
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