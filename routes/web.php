<?php

use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [OfertaController::class, 'index'])->middleware(['auth', 'verified'])->name('ofertas.index');
Route::get('/ofertas/create', [OfertaController::class, 'create'])->middleware(['auth', 'verified'])->name('ofertas.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
