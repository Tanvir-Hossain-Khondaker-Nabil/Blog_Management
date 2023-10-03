<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;


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
Route::get('/', [FrontendController::class,'index'])->name('front.index');
Route::get('/search', [FrontendController::class,'search'])->name('front.search');

Route::get('/about', [FrontendController::class,'index'])->name('front.about');
Route::get('/contact-us', [FrontendController::class,'contact_us'])->name('front.contact');

Route::get('/post/{slug}', [FrontendController::class,'post'])->name('front.post');
Route::get('/category/{slug}', [FrontendController::class,'index'])->name('front.category');
Route::get('/category/{cat_slug}/{sub_cat_slug}', [FrontendController::class,'index'])->name('front.subcategory');


Route::group(['prefix'=>'admin','middleware'=>'auth'] , function(){

    Route::get('/', [BackendController::class,'index'])->name('back.index');

    Route::get('sub-category-by-category-id/{id}',[SubCategoryController::class,'getSubCategoryByCategoryId']);
    
    Route::resource('category',CategoryController::class);
    Route::resource('tag',TagController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('comment',CommentController::class);
    Route::resource('reply',CommentController::class);
    Route::resource('contact',ContactController::class);

});






require __DIR__.'/auth.php';
