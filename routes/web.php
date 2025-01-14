<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CateringPackagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\ReservationController as CustomerReservationController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::redirect('/admin', '/admin/login');
    
    // Authentication routes
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login');

    Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])->name('register.show');
    Route::post('/admin/register', [AuthController::class, 'register'])->name('register');

    Route::get('/admin/lock_screen', [AuthController::class, 'showLockScreen'])->name('lockScreen.show');

    // Routes protected by auth middleware
    Route::middleware('auth:admin_users')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        /* Category routes */
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Package routes
        Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
        Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
        Route::put('/packages/{package}', [PackageController::class, 'update'])->name('packages.update');
        Route::delete('/packages/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');

        // Dish routes
        Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
        Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');
        Route::put('/dishes/{dish}', [DishController::class, 'update'])->name('dishes.update');
        Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');

        // Catering Packages Routes
        Route::get('/catering_packages', [CateringPackagesController::class, 'index'])->name('cateringPackages.index');

        // Reservation Routes
        Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');

        // Logout route
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // Test route
        Route::get('/test', [DashboardController::class, 'test'])->name('test.index');
    });

    // Customer Routes
    /* 
    * Main Route 
    */
    /* Route::get('/', [CustomerController::class, 'index'])->name('customer.index'); */

    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');

    Route::get('/reservations', [CustomerReservationController::class, 'show'])->name('reservations.index');
});
