<style>
    .loading-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 550px;
        width: 85%;
        background-color: #f0f0f0;
    }
</style>
<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @error('visar')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror

    <div class="">
        @if ($fileId)
        <div x-data="{ loading: true }">
            <div x-show="loading" class="loading-indicator">

                <div role="status" class="flex flex-col items-center gap-2">


                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-loader text-blue-600 animate-spin  fill-blue-600">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 6l0 -3" />
                        <path d="M16.25 7.75l2.15 -2.15" />
                        <path d="M18 12l3 0" />
                        <path d="M16.25 16.25l2.15 2.15" />
                        <path d="M12 18l0 3" />
                        <path d="M7.75 16.25l-2.15 2.15" />
                        <path d="M6 12l-3 0" />
                        <path d="M7.75 7.75l-2.15 -2.15" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                    <p class="text-sm font-semibold">Cargando PDF</p>
                </div>

                <!-- Puedes agregar un spinner o animación aquí -->
            </div>

            <object data="{{ url('/view-file/' . $fileId) }}" type="{{ $mimeType }}" width="85%" height="550" x-on:load="loading = false" x-show="!loading">
                Tu navegador no soporta la visualización de archivos.
            </object>


        </div>
        @else
        <p>No se encontró un archivo para visualizar.</p>
        @endif
    </div>

</div>