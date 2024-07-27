@include('menu.menu')

<div class="p-4 sm:ml-64 bg-gray-100 h-full">
    <div class="mt-14">
        <h1>Configuración del Proceso</h1>
        <div class="flex gap-5 mt-5 max-w-8xl mx-auto sm:px-6 lg:px-8">
            @include('menu.minmenu')
            <div class="flex flex-col gap-2 w-full">
                <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
                    <h1>Firmantes</h1>
                    <div class="">

                        <form class="mt-4 grid grid-cols-2 gap-3">
                            <div>
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Seleccione un Firmador</label>
                                <select id=" countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected>Seleccione</option>
                                    <option value="Visador 1">Visador 1</option>
                                    <option value="Visador 2">Visador 2</option>
                                    <option value="Visador 3">Visador 3</option>
                                    <option value="Visador 4">Visador 4</option>
                                </select>
                            </div>
                            <div class="flex">
                                <div>
                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Cargo</label>
                                    <select id=" countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccione</option>
                                        <option value="Cargo Principal">Cargo Principal</option>
                                        <option value="Cargo 2 (s)">Cargo 2 (s)</option>
                                        <option value="Cargo 3 (s)">Cargo 3 (s)</option>
                                        <option value="Cargo 4 (s)">Cargo 4 (s)</option>
                                    </select>
                                </div>
                                <div class=" items-baseline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>
                                </div>
                            </div>


                    </div>




                    </form>
                    <form class="mt-4 grid grid-cols-2 gap-3">
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Seleccione un Firmador</label>
                            <select id=" countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Seleccione</option>
                                <option value="Visador 1">Visador 1</option>
                                <option value="Visador 2">Visador 2</option>
                                <option value="Visador 3">Visador 3</option>
                                <option value="Visador 4">Visador 4</option>
                            </select>
                        </div>
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Cargo</label>
                            <select id=" countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Seleccione</option>
                                <option value="Cargo Principal">Cargo Principal</option>
                                <option value="Cargo 2 (s)">Cargo 2 (s)</option>
                                <option value="Cargo 3 (s)">Cargo 3 (s)</option>
                                <option value="Cargo 4 (s)">Cargo 4 (s)</option>
                            </select>
                        </div>




                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
</div>