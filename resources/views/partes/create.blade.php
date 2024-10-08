@extends('layouts.app')
@livewireStyles

@section('content')

<div class="mt-14">
    <h1>Configuración del Proceso</h1>
    <div class="mt-5 p-3 bg-white max-w-8xl mx-auto sm:px-6 lg:px-8">
        @include('menu.minmenu')
        <div class="flex flex-col gap-4 w-full">
            <div class="flex flex-col gap-2 ">
                <div class="grid gap-3">
                    <div class="p-3   bg-white ">
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
                    <div class="p-3   bg-white ">
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
                                    </svg>
                                    @if ($archivo && $archivo->nombre_archivo == null && $archivo->id_google_drive == null)
                                    <p>No hay datos</p>
                                    @elseif ($archivo)
                                    {{ $archivo->nombre_archivo }}
                                    @else
                                    <p>No se encontró el archivo</p>
                                    @endif
                                </a>
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

            </div>

        </div>


    </div>

</div>


@endsection
@livewireScripts