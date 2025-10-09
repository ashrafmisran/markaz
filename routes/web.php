<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Simple fallback named 'login' route used by some auth redirects.
// Redirects to Filament's configured login URL for the portal (if any).
Route::get('login', function () {
    if (function_exists('filament')) {
        return redirect(filament()->getLoginUrl());
    }

    return redirect('/');
})->name('login');
