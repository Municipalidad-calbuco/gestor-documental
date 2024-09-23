@extends('layouts.app')
@section('content')

<h1>Crear Proceso</h1>

<button data-modal-target="create-procedimiento" data-modal-toggle="create-procedimiento" class="p-3 border-gray-50 bg-white">Generar Proceso</button>

@include('modal.crear_proceso')
</div>


@endsection