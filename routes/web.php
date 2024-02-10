<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\UrlShortnerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontEndController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login_store', [AuthController::class, 'login_store'])->name('login.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_store', [AuthController::class, 'register_store'])->name('register.store');
Route::get('/dashboard', [UrlShortnerController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/store', [UrlShortnerController::class, 'store'])->name('store')->middleware('auth');
Route::get('/delete/{id}', [UrlShortnerController::class, 'delete'])->name('delete')->middleware('auth');
