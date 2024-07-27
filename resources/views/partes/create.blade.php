@include('menu.menu')
@livewireStyles
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="p-4 sm:ml-64 bg-gray-100 h-full">
    <div class="mt-14">
        <h1>Configuración del Proceso</h1>
        <div class="flex gap-5 mt-5 max-w-8xl mx-auto sm:px-6 lg:px-8">
            @include('menu.minmenu')
            <div class="flex flex-col gap-4 w-full">
                <div class="flex flex-col gap-2 ">
                    <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
                        <h1 class="font-bold">Información</h1>
                    </div>
                    <div class="p-4 shadow-lg w-full border  bg-white border-gray-200 rounded-lg">
                        <h1 class="mb-4 font-bold">Infomación de los Visadores</h1>
                        <livewire:user-select />
                    </div>

                </div>
                <div class="flex flex-col gap-2 ">

                    <div class="p-4 shadow-lg w-full border  bg-white border-gray-200 rounded-lg">
                        <h1 class="mb-4 font-bold">Infomación de los Firmadores</h1>
                        <livewire:dynamic-firma />
                    </div>

                </div>
            </div>


        </div>

    </div>

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