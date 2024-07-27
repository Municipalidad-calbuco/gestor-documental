<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/listado/firmas', function () {
        return view('firmas.entrada');
    })->name('firmas.entrada');
    Route::get('/proceso/archivo', function () {
        return view('partes.archivo');
    })->name('partes.archivo');

    Route::get('/proceso/visador', function () {
        return view('partes.create');
    })->name('partes.create');


    Route::get('/create/firmar', function () {
        return view('firmas.firmar');
    })->name('firmas.firmar');
});



require __DIR__ . '/auth.php';
