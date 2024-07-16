<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('customers', CustomerController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);
Route::resource('users', UserController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('purchases', PurchaseController::class);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
