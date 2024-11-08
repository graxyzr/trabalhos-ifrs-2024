<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasaController;

Route::get('/', [CasaController::class, 'index'])->name('casas.index');
Route::get('/casas/mais-cara', [CasaController::class, 'maisCara'])->name('casas.maisCara');
Route::get('/casas/create', [CasaController::class, 'create'])->name('casas.create');
Route::post('/casas', [CasaController::class, 'store'])->name('casas.store');
Route::get('/casas/{id}', [CasaController::class, 'show'])->name('casas.show');
Route::get('/casas/{id}/edit', [CasaController::class, 'edit'])->name('casas.edit');
Route::put('/casas/{id}', [CasaController::class, 'update'])->name('casas.update');
Route::delete('/casas/{id}', [CasaController::class, 'destroy'])->name('casas.destroy');
Route::get('/casas/filtro/{tipo}', [CasaController::class, 'filtro'])->name('casas.filtro');
Route::get('/casas/ordenar/{campo}', [CasaController::class, 'ordenar'])->name('casas.ordenar');
Route::post('/casas/buscar', [CasaController::class, 'buscar'])->name('casas.buscar');