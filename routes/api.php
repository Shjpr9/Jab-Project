<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Middleware\VerifyCaptchaResponseV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post("/login", [LoginController::class, 'authenticate'])->middleware([VerifyCaptchaResponseV2::class, 'web']);
Route::post("/login", [LoginController::class, 'authenticate'])->middleware(['web']);

Route::post('/signup', [SignupController::class, 'signup'])->middleware(['web']);
