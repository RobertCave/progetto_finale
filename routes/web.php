<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


// Homepage

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


//Dashboard

Route::get('/dashboard',[DashboardUser::class, 'dashboard'])->name('dashboard'); 
Route::get('/dashboard/orders',[DashboardUser::class, 'dashboard_orders'])->name('dashboard_orders'); 
Route::get('/dashboard/products',[DashboardUser::class, 'dashboard_products'])->name('dashboard_products'); 
Route::get('/dashboard/customers',[DashboardUser::class, 'dashboard_customers'])->name('dashboard_customers'); 



// --------Books - Books - Booooooooksssss ;-)

// Crea prodotto-libro
Route::get('/dashboard/books/create', [BookController::class, 'create'])->name('dashboard.books.create');

// Elenco prodotti
Route::get('/dashboard/books/list', [BookController::class, 'list'])->name('dashboard.books.list');