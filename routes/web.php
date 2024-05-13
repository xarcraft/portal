<?php

use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/terminos', function () {
    return view('terminos/terminos');
});

Route::get('/politica', function () {
    return view('terminos/politica');
});

Route::get('/dashboard', [OfertaController::class, 'index'])->middleware(['auth', 'verified'])->name('ofertas.index');
Route::get('/ofertas/create', [OfertaController::class, 'create'])->middleware(['auth', 'verified'])->name('ofertas.create');
Route::get('/ofertas/{oferta}/edit', [OfertaController::class, 'edit'])->middleware(['auth', 'verified'])->name('ofertas.edit');
Route::get('/ofertas/{oferta}/update', [OfertaController::class, 'update'])->middleware(['auth', 'verified'])->name('ofertas.update');
Route::get('/ofertas/{oferta}', [OfertaController::class, 'show'])->name('ofertas.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
