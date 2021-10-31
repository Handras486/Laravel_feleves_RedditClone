<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::post('/sign-up', [Controllers\Auth\RegisterController::class, 'store'])->name('auth.register');
    Route::post('/sign-in', [Controllers\Auth\SessionController::class, 'store'])->name('auth.login');  
});

Route::middleware(['auth'])->group(function () {
    Route::post('/sign-out', [Controllers\Auth\SessionController::class, 'destroy'])->name('auth.logout');
});
    
