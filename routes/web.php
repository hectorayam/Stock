<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/product/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');



