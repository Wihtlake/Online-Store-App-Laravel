<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe')->middleware('auth');
Route::post('/unsubscribe', [HomeController::class, 'unsubscribe'])->name('unsubscribe')->middleware('auth');

Route::get('/find', [HomeController::class, 'find'])->name('find');

Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');
Route::get('/catalog/{product}', [ProductController::class, 'show'])->name('catalog.show');

Route::get('/registration', [RegisterController::class, 'create'])->middleware('guest')->name('registration');
Route::post('/registration', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [loginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [loginController::class, 'store'])->middleware('guest');
Route::get('/logout', [loginController::class, 'destroy'])->middleware('auth')->name('logout');

// Корзина
Route::get('/basket', [CartController::class, 'index'])->middleware('auth')->name('basket');
Route::post('/basket/add/{id}', [CartController::class, 'add'])->middleware('auth')->name('basket.add');
Route::delete('/basket/{id}', [CartController::class, 'destroy'])->middleware('auth')->name('basket.destroy');
Route::post('/basket/{id}/plus', [CartController::class, 'plus'])->middleware('auth')->name('basket.plus');
Route::post('/basket/{id}/minus', [CartController::class, 'minus'])->middleware('auth')->name('basket.minus');

Route::post('/checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');




Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create')->middleware('admin');
Route::get('/admin/Products', [AdminController::class, 'products'])->name('admin.products')->middleware('admin');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users')->middleware('admin');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store')->middleware('admin');
Route::get('/admin/Products/{Product}/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware('admin');
Route::put('/admin/Products/{Product}', [AdminController::class, 'update'])->name('admin.update')->middleware('admin');
Route::delete('/admin/Products/{Product}', [AdminController::class, 'destroy'])->name('admin.delete')->middleware('admin');
Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('admin.feedback')->middleware('admin');
Route::delete('/admin/feedback{Feedback}', [AdminController::class, 'feedback_destroy'])->name('admin.feedback.destroy')->middleware('admin');
