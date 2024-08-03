<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('about', [PagesController::class, 'about'])->name('pages.about');

Route::resource('user', UserController::class);
