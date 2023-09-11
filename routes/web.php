<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/user/show_login', 'user.login')->name('user.show_login');
Route::view('/user/Registration', 'user.registration')->name('user.show_reg');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.profile');


Route::get('/user_products/search/{id}', [ProductController::class, 'product_search'])->name('user_products.search');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/user_products/{id}', [ProductController::class, 'user_products'])->name('product.user_product');

Route::view('/products/create', 'product.create')->name('product.create');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::put('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/user_category_products/{category}/{id}', [CategoryController::class, 'user_show_products'])->name('category.user_show_products');
Route::resource('/category', CategoryController::class);
Route::get('/user_categories/{id}', [CategoryController::class, 'user_categories'])->name('category.user_category');

// Route::view('/orders/create', 'orders.create')->name('orders.create');

Route::post('/cart/add/{productId}/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/{id}', [CartController::class, 'index'])->name('cart.index');