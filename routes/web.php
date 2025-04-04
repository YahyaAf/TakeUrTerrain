<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backOffice\TagController;
use App\Http\Controllers\backOffice\RoleController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\BackOffice\SponsorController;
use App\Http\Controllers\backOffice\TerrainController;
use App\Http\Controllers\frontOffice\TicketController;
use App\Http\Controllers\auth\ForgetPasswordController;
use App\Http\Controllers\frontOffice\ContactController;
use App\Http\Controllers\backOffice\CategorieController;
use App\Http\Controllers\backOffice\PermissionController;
use App\Http\Controllers\backOffice\GestionUsersController;
use App\Http\Controllers\frontOffice\ReservationController;
use App\Http\Controllers\frontOffice\CategoryTerrainController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('backOffice.dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::resource('/categories', CategorieController::class);
    });

    Route::prefix('dashboard')->group(function () {
        Route::resource('sponsors', SponsorController::class);
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('gestion-users', [GestionUsersController::class, 'index'])->name('backOffice.gestionUsers.index');
        Route::get('gestion-users/{id}/edit', [GestionUsersController::class, 'edit'])->name('backOffice.gestionUsers.edit');
        Route::put('gestion-users/{id}', [GestionUsersController::class, 'update'])->name('backOffice.gestionUsers.update');
        Route::delete('gestion-users/{id}', [GestionUsersController::class, 'destroy'])->name('backOffice.gestionUsers.destroy');
    });
   
    Route::prefix('dashboard')->group(function() {
        Route::resource('roles', RoleController::class);
    });

    Route::prefix('dashboard')->group(function() {
        Route::resource('permissions', PermissionController::class);
    });

    Route::prefix('dashboard/tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tags.index');
        Route::get('/create', [TagController::class, 'create'])->name('tags.create');
        Route::post('/', [TagController::class, 'store'])->name('tags.store');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
        Route::put('/{tag}', [TagController::class, 'update'])->name('tags.update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
    });

    Route::prefix('dashboard')->group(function() {
        Route::resource('terrains', TerrainController::class);
    });

    Route::get('/terrains', [CategoryTerrainController::class, 'index'])->name('frontOffice.terrains.index');
    Route::get('/terrains/{id}', [CategoryTerrainController::class, 'show'])->name('frontOffice.terrains.show');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

    Route::post('/checkout', [ReservationController::class, 'createCheckoutSession'])->name('checkout');
    Route::get('/payment/success/{id}', [ReservationController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel/{id}', [ReservationController::class, 'paymentCancel'])->name('payment.cancel');

    Route::get('/mes-tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/{id}/pdf', [TicketController::class, 'downloadPDF'])->name('ticket.pdf');



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



