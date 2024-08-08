<div>
    <div class="grid grid-cols-2 gap-3">
        <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
            <h1 class="font-bold">Información</h1>
            {{ $proceso->descripcion }}
        </div>
        <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
            <h1 class="font-bold mb-4">Archivo</h1>
            <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="file">
                <button class="flex gap-3 items-center mt-4 p-2 bg-gray-500" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-upload">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                        <path d="M7 9l5 -5l5 5" />
                        <path d="M12 4l0 12" />
                    </svg> Subir archivo</button>
            </form>

        </div>
    </div>

</div>