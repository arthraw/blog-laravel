<?php

use App\Http\Middleware\ValidUserAuth;
use Illuminate\Support\Facades\Route;


Route::middleware(ValidUserAuth::class)->group(function () {
    Route::view('/', 'welcome')->middleware();
});

Route::view('dashboard', 'dashboard')
    ->middleware(ValidUserAuth::class)
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
