<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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


Route::get('/backoffice/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::get('/backoffice/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/backoffice/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
