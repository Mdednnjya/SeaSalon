<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('home');
});

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'list'])->name('reviews.list');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
