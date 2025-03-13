<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backOffice\RoleController;
use App\Http\Controllers\backOffice\CategorieController;
use App\Http\Controllers\backOffice\PermissionController;
use App\Http\Controllers\backOffice\GestionUsersController;
use App\Http\Controllers\auth\AuthController;

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

Route::prefix('backoffice')->name('permissions.')->group(function() {
    Route::get('/permissions', [PermissionController::class, 'index'])->name('index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('create');
    Route::get('/permissions/{permissionId}/edit', [PermissionController::class, 'edit'])->name('edit');
});



// Authentication Routes
Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget-password');
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
});

