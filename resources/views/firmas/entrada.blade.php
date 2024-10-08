@extends('layouts.app')
@livewireStyles
@section('content')
<div>
    <h1 class="mb-4 text-2xl">Lista Firmas</h1>
    <livewire:table-firmar />
</div>

@endsection
@livewireScripts