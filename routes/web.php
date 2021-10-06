<?php

use App\Http\Controllers\CreateProductsController;
use App\Http\Controllers\DeleteProductsController;
use App\Http\Controllers\EditProductsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main web
Route::get('/', [ProductsController::class, 'index'])->name('main');


//Semua operasi CRUD di bawah bisa diselesaikan dengan Route::resource('products', [ClassController::class])
// dengan syarat, semua method function nya harus disimpan dalam 1 controller saja

//Show All Product
Route::get('/products', [ProductsController::class, 'products'])->name('products');


// Create Product
Route::get('/products/create', [CreateProductsController::class, 'create'])->name('products.create');

Route::post('/products', [CreateProductsController::class, 'store'])->name('products.store');


//Get particular product
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');


//Edit Product
Route::get('products/{product}/edit', [EditProductsController::class, 'edit'])->name('products.edit');

//Update product
Route::match(['put', 'patch'], '/products/{product}', [EditProductsController::class, 'update'])->name('products.update');

//Delete product
Route::delete('/products/{product}', [DeleteProductsController::class, 'destroy'])->name('products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
