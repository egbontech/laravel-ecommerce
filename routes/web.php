<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
  //frontend
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('download/{image}',[App\Http\Controllers\Frontend\FrontendController::class, 'download']);
Route::get('category',[App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('category/{slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('category/{category_slug}/{product_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'show']);
Route::get('product-list',[App\Http\Controllers\Frontend\FrontendController::class, 'ajax']);
Route::post('search-products',[App\Http\Controllers\Frontend\FrontendController::class, 'search']);


Auth::routes();
Route::get('Load-cart-data',[App\Http\controllers\Frontend\CartController::class,'loadcart']);
Route::post('add-to-cart',[App\Http\Controllers\Frontend\CartController::class, 'addTocart']);
Route::middleware(['auth'])->group(function (){

    
    Route::get('cart',[App\Http\controllers\Frontend\CartController::class,'viewcart']);
    Route::post('delete-cart-item',[App\Http\controllers\Frontend\CartController::class,'destroy']);
    Route::post('update-cart',[App\Http\controllers\Frontend\CartController::class,'update']);
    Route::get('checkout',[App\Http\controllers\Frontend\CheckoutController::class,'index']);
    Route::post('place-order',[App\Http\controllers\Frontend\CheckoutController::class,'placeorder']);
    Route::get('order-detials',[App\Http\controllers\Frontend\UserController::class,'index']);
    Route::get('view-order/{id}',[App\Http\controllers\Frontend\UserController::class,'view']);
    Route::get('delete-history/{id}',[App\Http\controllers\Frontend\UserController::class,'destroy']);

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

        //Dashboard
        Route::get('dashboard',[App\Http\controllers\Admin\DashboardController::class,'index']);
        Route::get('users',[App\Http\controllers\Admin\DashboardController::class,'users']);
        Route::get('view-user/{id}',[App\Http\controllers\Admin\DashboardController::class,'user']);
        Route::get('orders',[App\Http\controllers\Admin\OrderController::class,'index']);
        Route::get('view-orders/{id}',[App\Http\controllers\Admin\OrderController::class,'view']);
        Route::put('update-order/{id}',[App\Http\controllers\Admin\OrderController::class,'update']);
        Route::get('order-history',[App\Http\controllers\Admin\OrderController::class,'history']);

         //Category
        Route::get('categories',[App\Http\controllers\Admin\CategoryController::class,'index']);
        Route::get('add-category',[App\Http\controllers\Admin\CategoryController::class,'create']);
        Route::post('store-category',[App\Http\controllers\Admin\CategoryController::class,'store']);
        Route::get('edit-category/{id}',[App\Http\controllers\Admin\CategoryController::class,'edit']);
        Route::put('update-category/{id}',[App\Http\controllers\Admin\CategoryController::class,'update']);
        Route::get('delete-category/{id}',[App\Http\controllers\Admin\CategoryController::class,'destroy']);

        //Products
        Route::get('products',[App\Http\controllers\Admin\ProductController::class,'index']);
        Route::get('add-product',[App\Http\controllers\Admin\ProductController::class,'create']);
        Route::post('store-product',[App\Http\controllers\Admin\ProductController::class,'store']);
        Route::get('edit-product/{id}',[App\Http\controllers\Admin\ProductController::class,'edit']);
        Route::put('update-product/{id}',[App\Http\controllers\Admin\ProductController::class,'update']);
        Route::get('delete-product/{id}',[App\Http\controllers\Admin\ProductController::class,'destroy']);
});
