<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZingController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register', 'auth.register')->name('register');

Route::get('/makers', [UserController::class, 'index'])->name('makers.index');

Route::get('/makers/{user:slug}', [UserController::class, 'show'])->name('makers.show');

Route::get('/zings', [ZingController::class, 'index'])->name('zings.index');
Route::get('/zings/{zing:slug}', [ZingController::class, 'show'])->name('zings.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
