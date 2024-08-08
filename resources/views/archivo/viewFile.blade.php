<!DOCTYPE html>
<html>

<head>
    <title>View File</title>
</head>

<body>
    <h1>Visualizar Archivo</h1>
    <object data="{{ url('/view-file/' . $fileId) }}" type="{{ $mimeType }}" width="1000" height="800">
        Tu navegador no soporta la visualización de archivos.
    </object>
</body>

</html>