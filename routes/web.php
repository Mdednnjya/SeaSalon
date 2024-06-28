<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ServiceController;

Route::get('/', [HomeController::class, 'fetch'])->name('home');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'list'])->name('reviews.list');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::get('/reservations/history', [ReservationController::class, 'history'])->name('reservations.history');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}', [ReservationController::class, 'detail'])->name('reservations.detail');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/add-service', [AdminDashboardController::class, 'addService'])->name('admin.addService');
    Route::get('/admin/add-service', [AdminDashboardController::class, 'addService'])->name('admin.addService');
    Route::post('/admin/create-branch', [AdminDashboardController::class, 'createBranch'])->name('admin.createBranch');
    Route::post('/admin/add-service-to-branch', [AdminDashboardController::class, 'addServiceToBranch'])->name('admin.addServiceToBranch');
    Route::get('/get-branch-services/{branch}', [ReservationController::class, 'getBranchServices'])->name('get.branch.services');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/add-service', [AdminDashboardController::class, 'addService'])->name('admin.addService');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:name}', [ServiceController::class, 'show'])->name('services.show');
Route::middleware(['auth'])->group(function () {
    Route::get('/services/create', [ServiceController::class, 'store'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

Route::get('/get-branch-services/{branch}', [ReservationController::class, 'getBranchServices'])->name('get.branch.services');
