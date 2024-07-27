@include('menu.menu')
<style>
    #pdf-canvas {
        border: 1px solid black;
        margin-bottom: 10px;

        width: 912px;
        height: 1193px;
    }

    .signature-box {
        position: absolute;
        border: 2px dashed red;
        display: none;
        pointer-events: none;
    }

    .controls {
        margin-bottom: 10px;
    }

    .hidden {
        display: none;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
<div class="p-4 sm:ml-64 bg-gray-100 ">
    <div class="mt-14">
        <h1>Configuración del Proceso</h1>
        <div class="flex gap-5 mt-5 max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4">
                @include('menu.minmenu')
                <div class="p-3 border border-gray-200 bg-white rounded-lg shadow-lg w-[300px] ">
                    <h1>Asignar</h1>

                    <ul class="p-2 flex flex-col gap-3">

                        <li class="flex items-center justify-between gap-4">
                            <a href="" class="hover:bg-gray-100 hover:rounded-md p-2">
                                <div class="flex flex-col">
                                    <span class="text-sm">Pablo Mauricio Oyarzo Kappes</span>
                                    <span class="text-xs">Visador</span>
                                </div>
                            </a>

                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler text-green-400 icons-tabler-filled icon-tabler-circle-check">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                                </svg>
                            </div>

                        </li>
                        <li class="flex items-center justify-between gap-4">
                            <a href="" class="hover:bg-gray-100 hover:rounded-md p-2">
                                <div class="flex flex-col">
                                    <span class="text-sm">Pablo Mauricio Oyarzo Kappes</span>
                                    <span class="text-xs">Visador</span>
                                </div>
                            </a>

                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler text-green-400 icons-tabler-filled icon-tabler-circle-check">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                                </svg>
                            </div>

                        </li>
                        <li class="flex items-center justify-between gap-4">
                            <a href="" class="hover:bg-gray-100 hover:rounded-md p-2">
                                <div class="flex flex-col">
                                    <span class="text-sm">Pablo Mauricio Oyarzo Kappes</span>
                                    <span class="text-xs">Visador</span>
                                </div>
                            </a>

                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler text-green-400 icons-tabler-filled icon-tabler-circle-check">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                                </svg>
                            </div>

                        </li>
                        <li class="flex items-center justify-between gap-4">
                            <a href="" class="hover:bg-gray-100 hover:rounded-md p-2">
                                <div class="flex flex-col">
                                    <span class="text-sm">Pablo Mauricio Oyarzo Kappes</span>
                                    <span class="text-xs">Visador</span>
                                </div>
                            </a>

                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler text-orange-500 icons-tabler-filled icon-tabler-alert-triangle">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 1.67c.955 0 1.845 .467 2.39 1.247l.105 .16l8.114 13.548a2.914 2.914 0 0 1 -2.307 4.363l-.195 .008h-16.225a2.914 2.914 0 0 1 -2.582 -4.2l.099 -.185l8.11 -13.538a2.914 2.914 0 0 1 2.491 -1.403zm.01 13.33l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -7a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" />
                                </svg>
                            </div>

                        </li>

                    </ul>



                </div>

            </div>
            <div class="flex flex-col gap-2 w-full">
                <div class="p-3 shadow-lg  border  bg-white border-gray-200 rounded-lg">
                    <h1> Configuración del documento</h1>
                    <div class="mt-10">

                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Seleccione Documento:</label>
                        <input class="block  text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none  " type="file" id="pdf-upload" name="documento" accept="application/pdf">


                    </div>
                    <div class="controls flex items-center gap-4  mt-10">

                        <button id="prev-page" class="flex items-center gap-2 border bg-gray-800 text-white text-center border-gray-300 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 15h-8v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h8a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1z" />
                            </svg>
                            <span class="text-sm">Anterior</span>
                        </button>
                        <span>Página: <span id="page-num"></span> / <span id="page-count"></span></span>
                        <button id="next-page" class="flex items-center gap-2 border border-gray-300 text-center text-white bg-gray-800 p-2 rounded-md">
                            <span class="text-sm">Siguiente</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-right">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 9h8v-3.586a1 1 0 0 1 1.707 -.707l6.586 6.586a1 1 0 0 1 0 1.414l-6.586 6.586a1 1 0 0 1 -1.707 -.707v-3.586h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1z" />
                            </svg>

                        </button>



                    </div>
                    <div style="position: relative;">
                        <canvas id="pdf-canvas"></canvas>
                        <div id="signature-box" class="signature-box"></div>
                    </div>

                    <form method="POST" class="hidden" action="/firmar-documento" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="pdf-upload">Seleccionar PDF:</label>
                            <input type="file" id="pdf-upload" name="documento" accept="application/pdf">
                        </div>
                        <div>
                            <label for="otp">Código OTP:</label>
                            <input type="text" name="otp" id="otp" placeholder="Ingrese el código OTP">
                        </div>
                        <input type="text" name="llx" id="llx">
                        <input type="text" name="lly" id="lly">
                        <input type="text" name="urx" id="urx">
                        <input type="text" name="ury" id="ury">
                        <input type="text" name="page" id="page">
                        <button type="submit">Firmar Documento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        canvas = document.getElementById('pdf-canvas'),
        ctx = canvas.getContext('2d');

    document.getElementById('pdf-upload').addEventListener('change', function(event) {
        let file = event.target.files[0];
        if (file.type !== 'application/pdf') {
            console.error(file.name, "no es un archivo PDF.");
            return;
        }

        let reader = new FileReader();
        reader.onload = function(e) {
            let typedarray = new Uint8Array(e.target.result);

            pdfjsLib.getDocument(typedarray).promise.then(function(pdf) {
                pdfDoc = pdf;
                document.getElementById('page-count').textContent = pdf.numPages;
                renderPage(pageNum);
            });
        };
        reader.readAsArrayBuffer(file);
    });

    function renderPage(num) {
        pageRendering = true;
        pdfDoc.getPage(num).then(function(page) {
            let viewport = page.getViewport({
                scale: scale
            });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            let renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            let renderTask = page.render(renderContext);

            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        document.getElementById('page-num').textContent = num;
        document.getElementById('page').value = num;
    }

    document.getElementById('prev-page').addEventListener('click', function() {
        if (pageNum <= 1) return;
        pageNum--;
        renderPage(pageNum);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        renderPage(pageNum);
    });

    let isDrawing = false;
    let startX, startY;

    canvas.addEventListener('mousedown', function(event) {
        isDrawing = true;
        let rect = canvas.getBoundingClientRect();
        startX = event.clientX - rect.left;
        startY = event.clientY - rect.top;
    });

    canvas.addEventListener('mousemove', function(event) {
        if (!isDrawing) return;
        let rect = canvas.getBoundingClientRect();
        let endX = event.clientX - rect.left;
        let endY = event.clientY - rect.top;

        let signatureBox = document.getElementById('signature-box');
        signatureBox.style.left = Math.min(startX, endX) + 'px';
        signatureBox.style.top = Math.min(startY, endY) + 'px';
        signatureBox.style.width = Math.abs(endX - startX) + 'px';
        signatureBox.style.height = Math.abs(endY - startY) + 'px';
        signatureBox.style.display = 'block';
    });

    canvas.addEventListener('mouseup', function(event) {
        isDrawing = false;
        let rect = canvas.getBoundingClientRect();
        let endX = event.clientX - rect.left;
        let endY = event.clientY - rect.top;

        pdfDoc.getPage(pageNum).then(function(page) {
            let viewport = page.getViewport({
                scale: 1
            }); // Escala 1 para obtener dimensiones reales
            let pdfWidth = viewport.width;
            let pdfHeight = viewport.height;

            // Calcular el factor de escala entre el canvas y el PDF real
            let scaleX = pdfWidth / canvas.width;
            let scaleY = pdfHeight / canvas.height;

            // Calcular las coordenadas en el espacio del PDF
            let llx = Math.min(startX, endX) * scaleX;
            let lly = pdfHeight - Math.max(startY, endY) * scaleY; // Invertir Y y escalar
            let urx = Math.max(startX, endX) * scaleX;
            let ury = pdfHeight - Math.min(startY, endY) * scaleY; // Invertir Y y escalar

            // Actualizar los campos del formulario
            document.getElementById('llx').value = Math.round(llx);
            document.getElementById('lly').value = Math.round(lly);
            document.getElementById('urx').value = Math.round(urx);
            document.getElementById('ury').value = Math.round(ury);
            document.getElementById('page').value = pageNum;

            console.log('Posición seleccionada:', {
                llx: document.getElementById('llx').value,
                lly: document.getElementById('lly').value,
                urx: document.getElementById('urx').value,
                ury: document.getElementById('ury').value,
                page: pageNum
            });
        });
    });
</script>