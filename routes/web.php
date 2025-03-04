<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GestionUsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backOffice.dashboard');
})->name('dashboard');

Route::prefix('backoffice/categories')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::get('/edit', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::get('/{id}', [CategorieController::class, 'show'])->name('categories.show');
});

Route::get('/backoffice/gestion-users', [GestionUsersController::class, 'index'])->name('gestion-users.index');
