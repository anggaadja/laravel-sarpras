<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\AuthController;

// Login routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Redirect root to sarpras index (requires auth)
Route::get('/', function () {
    return redirect()->route('sarpras.index');
})->middleware('auth');

// Sarpras resource routes (protected by auth)
Route::resource('sarpras', SarprasController::class)->middleware('auth');

Route::get('/verify-me', function () {
    return 'INI ADALAH PROJECT YANG BENAR (VERIFIED)';
});


