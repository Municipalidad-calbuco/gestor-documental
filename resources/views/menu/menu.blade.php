@vite(['resources/css/app.css','resources/js/app.js'])


<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-20">

    <div class="grid grid-cols-3 p-1 items-center gap-4 shadow-md text-white ">

        <div class=" flex flex-col ml-3">
            <h1 class="text-blue-700 font-medium">Ilustre Municipalidad de Calbuco</h1>
            <span class="text-gray-500 font-roboto text-sm">Gestor documental</span>
        </div>
        <div>
            <h1></h1>
        </div>

        <div class=" flex items-center justify-end gap-3 mr-3 ">
            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex gap-1 p-2 items-center hover:bg-gray-100 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-600" viewBox="0 0 24 24" width="14" height="14" color="#000000" fill="none">
                    <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
                </svg><span class="text-sm">Pablo Mauricio Oyarzo Kappes</span>
            </button>
            <div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 border border-gray-300 rounded-lg shadow-xl w-72">
                <div class="px-4 py-3 text-sm text-gray-900">
                    <div class="truncate">Oficina de Informatica</div>
                </div>
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">

                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                    </li>

                </ul>

            </div>
            <div>
                <a href="" class="text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500" viewBox="0 0 24 24" width="16" height="16" color="#000000" fill="none">
                        <path d="M7.02331 5.5C4.59826 7.11238 3 9.86954 3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 9.86954 19.4017 7.11238 16.9767 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 2V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

            </div>
        </div>

    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-800 border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">
        <ul class=" mt-5 space-y-2 text-sm">
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="text-white" color="#000000" fill="none">
                        <path d="M13.5 13L17 9M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M6 12C6 8.68629 8.68629 6 12 6C13.0929 6 14.1175 6.29218 15 6.80269" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M2.50006 12.0001C2.50006 7.52172 2.50006 5.28255 3.8913 3.8913C5.28255 2.50006 7.52172 2.50006 12.0001 2.50006C16.4784 2.50006 18.7176 2.50006 20.1088 3.8913C21.5001 5.28255 21.5001 7.52172 21.5001 12.0001C21.5001 16.4784 21.5001 18.7176 20.1088 20.1088C18.7176 21.5001 16.4784 21.5001 12.0001 21.5001C7.52172 21.5001 5.28255 21.5001 3.8913 20.1088C2.50006 18.7176 2.50006 16.4784 2.50006 12.0001Z" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
        </ul>
        <div class="mt-5 flex flex-col gap-4">


            <span class=" text-[12px] text-gray-400">Partes</span>
        </div>
        <ul class=" mt-5 space-y-2 text-sm">
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-progress">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                    </svg>
                    <span class="ms-3">Listado de Procesos</span>
                </a>
            </li>
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white " width="16" height="16" color="#000000" fill="none">
                        <path d="M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M4.64856 5.07876C4.7869 4.93211 4.92948 4.7895 5.0761 4.65111M7.94733 2.72939C8.12884 2.6478 8.31313 2.57128 8.5 2.5M2.5 8.5C2.57195 8.31127 2.64925 8.12518 2.73172 7.94192" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 8V16M16 12L8 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ms-3">Generar un Proceso</span>
                </a>
            </li>

        </ul>

        <div class="mt-5 flex flex-col gap-4">


            <span class=" text-[12px] text-gray-400">Firmas</span>
        </div>
        <ul class=" mt-5 space-y-2 text-sm">
            <li>
                <a href="/listado/firmas" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('firmas.entrada')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" viewBox="0 0 24 24" width="16" height="16" color="#000000" fill="none">
                        <path d="M7 2.5C5.59269 2.66536 4.62427 3.01488 3.89124 3.75363C2.5 5.15575 2.5 7.41242 2.5 11.9258C2.5 16.4391 2.5 18.6958 3.89124 20.0979C5.28249 21.5 7.52166 21.5 12 21.5C16.4783 21.5 18.7175 21.5 20.1088 20.0979C21.5 18.6958 21.5 16.4391 21.5 11.9258C21.5 7.41242 21.5 5.15575 20.1088 3.75363C19.3757 3.01488 18.4073 2.66536 17 2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.5 8C9.99153 8.5057 11.2998 10.5 12 10.5M14.5 8C14.0085 8.5057 12.7002 10.5 12 10.5M12 10.5V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M21.5 13.5H16.5743C15.7322 13.5 15.0706 14.2036 14.6995 14.9472C14.2963 15.7551 13.4889 16.5 12 16.5C10.5111 16.5 9.70373 15.7551 9.30054 14.9472C8.92942 14.2036 8.26777 13.5 7.42566 13.5H2.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    </svg>
                    <span class="ms-3">Bandeja de entrada</span>
                    <span class="inline-flex items-center justify-center  ms-3  w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full ">2</span>
                </a>
            </li>
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <span class="ms-3">Visar</span>
                </a>
            </li>
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-writing">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" />
                        <path d="M16 7h4" />
                        <path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3" />
                    </svg>
                    <span class="ms-3">Firmar</span>
                </a>
            </li>
        </ul>
        <div class="mt-5 flex flex-col gap-4">


            <span class=" text-[12px] text-gray-400">Distribuciones</span>
        </div>
        <ul class=" mt-5 space-y-2 text-sm">
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white" width="16" height="16" color="#000000" fill="none">
                        <path d="M14.9263 2.91103L8.27352 6.10452C7.76151 6.35029 7.21443 6.41187 6.65675 6.28693C6.29177 6.20517 6.10926 6.16429 5.9623 6.14751C4.13743 5.93912 3 7.38342 3 9.04427V9.95573C3 11.6166 4.13743 13.0609 5.9623 12.8525C6.10926 12.8357 6.29178 12.7948 6.65675 12.7131C7.21443 12.5881 7.76151 12.6497 8.27352 12.8955L14.9263 16.089C16.4534 16.8221 17.217 17.1886 18.0684 16.9029C18.9197 16.6172 19.2119 16.0041 19.7964 14.778C21.4012 11.4112 21.4012 7.58885 19.7964 4.22196C19.2119 2.99586 18.9197 2.38281 18.0684 2.0971C17.217 1.8114 16.4534 2.17794 14.9263 2.91103Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.4581 20.7709L9.96674 22C6.60515 19.3339 7.01583 18.0625 7.01583 13H8.14966C8.60978 15.8609 9.69512 17.216 11.1927 18.197C12.1152 18.8012 12.3054 20.0725 11.4581 20.7709Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.5 12.5V6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ms-3">Bandeja de entrada</span>
                </a>
            </li>


        </ul>
        <div class="mt-5 flex flex-col gap-4">


            <span class=" text-[12px] text-gray-400">Archivos</span>
        </div>
        <ul class=" mt-5 space-y-2 text-sm">
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group  @if(request()->routeIs('organizaciones.index')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    </svg>
                    <span class="ms-3">Mis documentos</span>
                </a>
            </li>

        </ul>

        <div class="mt-5 flex flex-col gap-4">
            <span class=" text-[12px] text-gray-400">Sesión</span>
        </div>
        <ul class=" mt-5 space-y-2 text-sm">
            <li>
                <a href="" class="flex items-center p-2 rounded-lg text-white  hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white" width="16" height="16" color="#000000" fill="none">
                        <path d="M14 9H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M14 12.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <rect x="2" y="3" width="20" height="18" rx="5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        <path d="M5 16C6.20831 13.4189 10.7122 13.2491 12 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.5 9C10.5 10.1046 9.60457 11 8.5 11C7.39543 11 6.5 10.1046 6.5 9C6.5 7.89543 7.39543 7 8.5 7C9.60457 7 10.5 7.89543 10.5 9Z" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    <span class="ms-3">Editar mi información</span>
                </a>
            </li>

        </ul>
    </div>
</aside>