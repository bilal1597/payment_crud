<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





Route::get('/login', [UserController::class, 'getLogin'])->name('view.login');
Route::post('/login', [UserController::class, 'login'])->name('user.auth');

Route::get('/register', [UserController::class, 'viewRegister'])->name('view.register');
Route::post('/register', [UserController::class, 'register'])->name('user.save');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('/forgot', [AuthController::class, 'forgotPassword'])->name('user.forgot');

Route::get('/reset/{token}', [AuthController::class, 'getReset'])->name('reset');
Route::post('/reset/{token}', [AuthController::class, 'postReset'])->name('post.reset');

///////////////////// PRODUCTS //////////////////////

Route::get('/products', [UserController::class, 'showProducts'])->name('product.view');

Route::get('/add/products', [UserController::class, 'loadAddUser'])->name('viewAdd.product');
Route::post('/add/products', [UserController::class, 'addUser'])->name('post.product');


Route::get('/edit/{id}', [UserController::class, 'viewProduct'])->name('view.product');
Route::put('/edit/products', [UserController::class, 'editProduct'])->name('edit.product');


Route::delete('/delete/{id}', [UserController::class, 'deleteProduct'])->name('delete.product');


Route::post('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('/success', [UserController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [UserController::class, 'cancel'])->name('checkout.cancel');


// Route::resource('products', ProductController::class);
