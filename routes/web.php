<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backOffice.dashboard');
})->name('dashboard');

Route::get('backOffice/components/element', function () {
    return view('backOffice.components.element');
})->name('backOffice.components.element');
