<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('subcategory', SubCategoryController::class);
Route::resource('gallery', GalleryController::class);
Route::resource('product', ProductController::class);

Route::get('sub-categories', [ProductController::class, 'getSubCategories'])->name('subcategories.get');



Route::get('/dropdown',[TestController::class , 'index']);
Route::get('/dropdown-data',[TestController::class , 'data']);
