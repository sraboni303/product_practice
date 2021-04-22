<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Gallery;

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

Route::get('/gallery', [ProductGalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create/{id}', [ProductGalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery/store', [ProductGalleryController::class, 'store'])->name('gallery.store');
Route::get('/delete/{id}', [ProductGalleryController::class, 'delete'])->name('gallery.delete');


Route::resource('category', CategoryController::class);
Route::resource('subcategory', SubCategoryController::class);
// Route::resource('gallery', GalleryController::class);
// Route::get('gallery/{id}', [GalleryController::class, 'index']);

Route::get('subcategories/fetch', [ProductController::class, 'getSubCategories'])->name('subcategories.fetch');
Route::resource('product', ProductController::class);

