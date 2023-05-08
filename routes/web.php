<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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
    return view('welcome');
});


Route::get('/products/index', [ProductController::class, "index"])->name('products.index');
Route::get('/products/create', [ProductController::class, "create"])->name('products.create');
Route::post('products/create', [ProductController::class, "store"])->name('products.store');
Route::get('/products/showCart', [ProductController::class, "showCart"])->name('products.showCart');
Route::get('/products/{product}', [ProductController::class, "show"])->name('products.show');
Route::post('/products/{product}', [ProductController::class, "addCart"])->name('products.addCart');
Route::get('/product/{product}/edit', [ProductController::class, "edit"])->name('products.edit');
Route::patch('/products/{product}/edit', [ProductController::class, "update"])->name('products.update');
Route::delete('/product/{product}/edit', [ProductController::class, "destroy"])->name('products.destroy');
// Route::post('/products/create', [ProductController::class, "confirm"])->name('products.confirm');
// Route::post('/product/{product}/edit', [ProductController::class, "confirm"])->name('products.confirm');
