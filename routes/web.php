<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    //return "Esta es mi pagina";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
