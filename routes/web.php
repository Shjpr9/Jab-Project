<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/signup', function() {
    return view('signup');
})->name('signup');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/success', function() {
    return view('success');
})->middleware('auth');

Route::get('/about', function() {
    return view('about');
})->name('about');

