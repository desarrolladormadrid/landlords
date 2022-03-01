<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filter', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');

Route::get('/request/{id}', [App\Http\Controllers\ToRentController::class, 'requestRent'])->name('requestRent');
Route::post('/request/{id}', [App\Http\Controllers\ToRentController::class, 'toRent'])->name('toRent');

Route::get('/publish/{id}', [App\Http\Controllers\PublishController::class, 'publish'])->name('publish');
Route::post('/create', [App\Http\Controllers\PublishController::class, 'create'])->name('create');
