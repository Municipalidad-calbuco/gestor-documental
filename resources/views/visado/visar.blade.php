@extends('layouts.app')
@livewireStyles
@section('content')
<div class="">

    <div class="grid grid-cols-2">
        <livewire:ver-documento :id="request()->route('id')" />

        <livewire:visar-documento :id="request()->route('id')" />

    </div>
    <div class="flex flex-col gap-5 mt-4 ">
        <livewire:lista-visadores :id="request()->route('id')" />
        <livewire:lista-firmadores :id="request()->route('id')" />
    </div>





</div>




@endsection
@livewireScripts