<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\FirmadorController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCargoController;
use App\Http\Controllers\VisadorController;
use App\Models\Proceso;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\VerArchivo;
use App\Livewire\FirmaVisadorComponent;
use App\Livewire\UserSelect;
use App\Models\Firmador;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('partes.create');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/create/proceso', [ProcesoController::class, 'index'])->name('partes.proceso');
    Route::post('/create/-nuevo', [ProcesoController::class, 'create'])->name('partes.proceso');
    Route::get('/create/{id}', [ProcesoController::class, 'detalle'])->name('partes.create');
    Route::get('/create/Firmas-Visadores/{id}', [FirmadorController::class, 'visadoresfirma'])->name('partes.firmas');
    Route::delete('delete/visador/{id}', [VisadorController::class, 'destroy'])->name('partes.delete');
    Route::get('/listado/visar', [VisadorController::class, 'index'])->name('visado.listado');
    Route::get('/proceso/visar/{id}', [VisadorController::class, 'detalle'])->name('visado.visar');
    Route::get('/proceso/firmar/{id}', [FirmadorController::class, 'detalle'])->name('firmas.firmar');

    Route::post('/upload', [ArchivoController::class, 'uploadFile'])->name('upload.file');
    Route::get('/download-file/{fileId}', [ArchivoController::class, 'getFile'])->name('download-file');
    Route::get('/view-file/{fileId}', [ArchivoController::class, 'viewFile'])->name('archivo.viewFile');
    Route::get('/show-file/{fileId}', [ArchivoController::class, 'showFile'])->name('show-file');
    Route::post('/crear-visador', [VisadorController::class, 'store'])->name('visador.create');
    Route::get('/proceso/archivo/{id}', [ArchivoController::class, 'detalle'])->name('proceso.archivo');

    //ADMINISTRACIÓN DEL SISTEMA
    Route::get('/administracion/users', [UserCargoController::class, 'index'])->name('administracion.user');

    Route::post('/firmar-documento', [FirmadorController::class, 'firmarDocumento'])->name('firmar.documento');
    Route::get('/descargar-documento/{fileName}', [FirmadorController::class, 'descargarDocumento']);
    Route::get('/listado/firmas', function () {
        return view('firmas.entrada');
    })->name('firmas.entrada');
    Route::get('/proceso/archivo', function () {
        return view('partes.archivo');
    })->name('partes.archivo');




    Route::get('/create/firmar', function () {
        return view('firmas.firmar');
    })->name('firmas.firmar');
});



require __DIR__ . '/auth.php';
