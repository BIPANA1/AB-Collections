<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Models\Editprofile;
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
});

Route::group(['middleware' => ["auth"]], function () {
    // edit profile
    Route::get('/create', [EditProfileController::class, 'create']);
    Route::post('/update-profile', [EditProfileController::class, 'editProfile'])->name('update-profile');;
    Route::get('/view-profile', [EditProfileController::class, 'viewProfile']);
});
