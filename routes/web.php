<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'fetch'])->name('home');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'list'])->name('reviews.list');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
