<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ForgotPassController;

Route::get('/', function () {
    return view('index');
});

// Signup
Route::get('/signup', function() {return view('signup');})->name('signup');
Route::post('/signup', [SignupController::class, 'webSignup']);

// Login
Route::get('/login', function() {return view('login');})->name('login');
Route::post('/login', [LoginController::class, 'webLogin']);

Route::get('/success', function() {return view('success');})->middleware('auth');

Route::get('/about', function() {return view('about');})->name('about');

Route::prefix('/forgotPassword')->group(function() {
    Route::get('/', function() {return view('forgotpassword');});
    Route::post('/', [ForgotPassController::class, 'forgot']);
    Route::get('/confirm/{token}', [ForgotPassController::class, 'confirm']);
    Route::get('/success', function() { return view('newPass'); })->name('reset');
});