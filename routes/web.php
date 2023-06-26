<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('/home');
// });

Route::get('/', [ProductController::class, "index"])->name('products.index');
Route::get('/home', [ProductController::class, "index"])->name('products.index');
Route::get('/products/index', [ProductController::class, "index"])->name('products.index');
Route::get('/products/showCart', [ProductController::class, "showCart"])->name('products.showCart');
Route::get('/products/emptyCart', [ProductController::class, "showCart"])->name('products.emptyCart');
Route::post('/products/showCart', [ProductController::class, "removeCart"])->name('products.removeCart');
Route::get('/products/showLiked', [ProductController::class, "showLiked"])->name('products.showLiked');
Route::get('/products/search', [ProductController::class, "search"])->name('products.search');
Route::get('/products/create', [ProductController::class, "create"])->name('products.create');
Route::post('products/create', [ProductController::class, "store"])->name('products.store');
Route::get('/products/{product}', [ProductController::class, "show"])->name('products.show');
Route::post('/products/{product}', [ProductController::class, "addCart"])->name('products.addCart');
Route::get('/product/{product}/edit', [ProductController::class, "edit"])->name('products.edit');
Route::patch('/products/{product}/edit', [ProductController::class, "update"])->name('products.update');
Route::delete('/product/{product}/edit', [ProductController::class, "destroy"])->name('products.destroy');


Route::group(['middleware' => ['auth']], function(){
    // Route::get('/', [ProductController::class, "index"])->name('products.index');
    // Route::get('/home', [ProductController::class, "index"])->name('products.index');
    // Route::get('/products/showLiked', [ProductController::class, "showLiked"])->name('products.showLiked');
    // Route::get('/products/index', [ProductController::class, "index"])->name('products.index');
    // Route::get('/products/search', [ProductController::class, "search"])->name('products.search');
    // Route::get('/products/create', [ProductController::class, "create"])->name('products.create');
    // Route::post('products/create', [ProductController::class, "store"])->name('products.store');
    // Route::get('/products/showCart', [ProductController::class, "showCart"])->name('products.showCart');
    // Route::get('/products/emptyCart', [ProductController::class, "showCart"])->name('products.emptyCart');
    // Route::post('/products/showCart', [ProductController::class, "removeCart"])->name('products.removeCart');
    Route::get('/users/show', [UserController::class, "show"])->name('users.show');
    Route::patch('/users/show', [UserController::class, "update"])->name('users.update');
    Route::delete('/users/show', [UserController::class, "softDelete"])->name('users.softDelete');
    // Route::get('/products/{product}', [ProductController::class, "show"])->name('products.show');
    // Route::post('/products/{product}', [ProductController::class, "addCart"])->name('products.addCart');
    // Route::get('/product/{product}/edit', [ProductController::class, "edit"])->name('products.edit');
    // Route::patch('/products/{product}/edit', [ProductController::class, "update"])->name('products.update');
    // Route::delete('/product/{product}/edit', [ProductController::class, "destroy"])->name('products.destroy');
});

