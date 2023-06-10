<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('twitter/account/delete', 'UserTwitterAccountController@delete')->name('twitter.deleteAccount');
// Route::post('storeLike', 'ProductController@storeLike')->name('products.storeLike'); 
// Route::post('deleteLike', 'ProductController@deleteLike')->name('products.deleteLike');
Route::post('storeLike', [ProductController::class, "storeLike"])->name('products.storeLike');
// Route::post('deleteLike', [ProductController::class, "deleteLike"])->name('products.deleteLike');