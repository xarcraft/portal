<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/terminos', function () {
    return view('terminos/terminos');
});

Route::get('/politica', function () {
    return view('terminos/politica');
});

Route::get('/dashboard', [OfertaController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('ofertas.index');
Route::get('/ofertas/create', [OfertaController::class, 'create'])->middleware(['auth', 'verified'])->name('ofertas.create');
Route::get('/ofertas/{oferta}/edit', [OfertaController::class, 'edit'])->middleware(['auth', 'verified'])->name('ofertas.edit');
Route::get('/ofertas/{oferta}/update', [OfertaController::class, 'update'])->middleware(['auth', 'verified'])->name('ofertas.update');
Route::get('/ofertas/{oferta}', [OfertaController::class, 'show'])->name('ofertas.show');
Route::get('/postulados/{oferta}', [CandidatoController::class, 'index'])->name('candidatos.index');

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
