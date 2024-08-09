<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('about', [PagesController::class, 'about'])->name('pages.about');

Route::resource('user', UserController::class);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
