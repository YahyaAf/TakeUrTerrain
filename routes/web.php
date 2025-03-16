<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backOffice\RoleController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\auth\ForgetPasswordController;
use App\Http\Controllers\backOffice\CategorieController;
use App\Http\Controllers\backOffice\PermissionController;
use App\Http\Controllers\backOffice\GestionUsersController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

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
   
    Route::prefix('backoffice')->group(function() {
        Route::resource('roles', RoleController::class);
    });

    Route::prefix('backoffice')->group(function() {
        Route::resource('permissions', PermissionController::class);
    });

});

Route::prefix('auth')->group(function() {
    Route::middleware(RedirectIfAuthenticated::class)->group(function() {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
        Route::get('/forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
        Route::post('/forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('password.email');
        Route::get('/reset-password/{token}/{email}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('password.update');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



