<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\GestionUsersController;
use App\Http\Controllers\AuthController;

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

Route::prefix('permissions')->name('permissions.')->group(function() {
    Route::get('/', [PermissionController::class, 'index'])->name('index');
    Route::get('/create', [PermissionController::class, 'create'])->name('create');
    Route::get('/{permissionId}/edit', [PermissionController::class, 'edit'])->name('edit');
});



// Authentication Routes
Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget-password');
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
});

