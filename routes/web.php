<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.dashboard');
});

Route::get('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/register', [AuthController::class, 'register'])->name('user.register');

Route::post('/store', [AuthController::class, 'store'])->name('user.store');