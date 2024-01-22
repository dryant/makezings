<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('maker');
    return "maker/index";
})->name('index');