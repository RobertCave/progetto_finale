<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


// Homepage

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


//Dashboard

Route::controller(DashboardUser::class)->prefix('dashboard')->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/orders', 'dashboard_orders')->name('dashboard_orders');
    Route::get('/products', 'dashboard_products')->name('dashboard_products');
    Route::get('/customers', 'dashboard_customers')->name('dashboard_customers');
});

// --------Books - Books - Booooooooksssss ;-)

Route::controller(BookController::class)->prefix('dashboard/books')->name('dashboard.books.')->group(function () {
    Route::get('/create', 'create')->name('create'); // route('dashboard.books.create')
    Route::get('/list', 'list')->name('list');       // route('dashboard.books.list')
});