@include('menu.menu')
<div class="p-4 sm:ml-64 bg-gray-100 h-full">
    <div class="mt-14">
        <h1>Crear Proceso</h1>

        <button data-modal-target="create-procedimiento" data-modal-toggle="create-procedimiento" class="p-3 border-gray-50 bg-white">Generar Proceso</button>
        
        @include('modal.crear_proceso')
    </div>

</div>


