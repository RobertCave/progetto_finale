<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


// Homepage

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Shop page
Route::get('/shop', [PublicController::class, 'shop'])->name('shop');

// Shop per category
Route::get('/shop/category/{categoryId}', [CategoryController::class, 'shopByCategory'])->name('shop.category');


// Faq pagina fittizio
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');

// Contact page fittizio
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

// Book details
Route::get('/book/{id}', [PublicController::class, 'bookDetails'])->name('book.details');

// Carrello 

Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');

// Checkout

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');

// Orders
Route::post('/process-order', [OrderController::class, 'processOrder'])->name('process.order')->middleware('auth');
Route::get('/order-success/{orderId}', [OrderController::class, 'orderSuccess'])->name('order.success')->middleware('auth');

// User Orders
Route::get('/orders', [OrderController::class, 'userOrders'])->name('user.orders')->middleware('auth');


//Dashboard maledetta e che non mi piace

Route::controller(DashboardUser::class)->prefix('dashboard')->middleware('isAdmin')->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/orders', 'dashboard_orders')->name('dashboard_orders');

    // Route::get('/orders/{id}', 'viewOrder')->name('dashboard.order.view');

    Route::get('/orders/{id}/edit', 'editOrder')->name('dashboard.order.edit');
    Route::put('/orders/{id}', 'updateOrder')->name('dashboard.order.update');


    Route::get('/products', 'dashboard_products')->name('dashboard_products');
    Route::get('/customers', 'dashboard_customers')->name('dashboard_customers');
});

// --------Books - Books - Booooooooksssss ;-)

Route::controller(BookController::class)->prefix('dashboard/books')->name('dashboard.books.')->middleware('isAdmin')->group(function () {
    Route::get('/create', 'create')->name('create'); // route('dashboard.books.create')
    Route::get('/list', 'list')->name('list');       // route('dashboard.books.list')
});
