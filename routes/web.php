<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Models\Editprofile;
use App\Models\product;
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
    $products = product::all();
    return view('user.home',compact('products'));
});
// Route::get('/',[HomeController::class,'welcome']);

// Route::get('/user-home',[HomeController::class,'home']);
Route::get('/create-products',[FrontendController::class,'createProduct']);

Route::get('/show-category', [FilterController::class, 'showCategory']);
Route::get('/show-highestprice', [FilterController::class, 'showHighestPrice']);
// search
Route::post('/search', [SearchController::class, 'search']);


Auth::routes();

Route::group(['middleware' => ["auth", "admin"]], function () {
    //dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //category
    Route::get('/category', [FrontendController::class, 'category']);
    Route::get('/addcategory', [FrontendController::class, 'addcategory']);
    Route::post('/store-category', [CategoryController::class, 'store']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);
    //product
    Route::get('/product', [FrontendController::class, 'product']);
    Route::get('/addproduct', [FrontendController::class, 'addproduct']);
    Route::post('/store-product', [ProductController::class, 'store']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
    Route::post('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/edit-product{id}', [ProductController::class, 'edit']);

     // order
     
     Route::get('/order', [FrontendController::class, 'order']);
     Route::get('/delete-order/{id}', [FrontendController::class, 'deleteOrder']);
});

Route::group(['middleware' => ["auth"]], function () {
    // edit profile
    Route::get('/create', [EditProfileController::class, 'create']);
    Route::post('/update-profile', [EditProfileController::class, 'editProfile'])->name('update-profile');;
    Route::get('/view-profile', [EditProfileController::class, 'viewProfile']);

    // product page
    Route::get('/create-products',[FrontendController::class,'createProduct']);

    // add to cart 
    Route::get('/cart',[CartController::class,'cart']);
    Route::post('/addCart/{id}',[CartController::class,'store']);
    Route::get('/destroy-cart/{id}', [CartController::class, 'destroy']);


    // quantity increase and decrease
    Route::post('/updateQuantity',[CartController::class,'updateQuantity'])->name('cart.updateQuantity');

    // order
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order-details', [OrderController::class, 'orderDetails']);
    Route::get('/delete-details/{id}',[OrderController::class,'destroy']);


     // checkout
     Route::get('/checkout', [OrderController::class, 'checkout']);
     Route::get('/place-order', [OrderController::class, 'placeOrder']);

    // search
    Route::post('/search', [SearchController::class, 'search']);
    

});
