<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataEntryController;
use App\Http\Controllers\DataManageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
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

//categories / sub-categories / products routing
Route::controller(CategoryController::class)->group(function(){
    Route::get('/','home_cat');
    //Route::get('/sub-categories/{id}','sub_cat');
    Route::get('/product/{id}','products');
});


//Pages routing 
Route::controller(PageController::class)->group(function(){

    Route::get('/about','about')->name('about');
    Route::get('/posts','posts')->name('posts');
    Route::get('/add-category','categoryForm')->name('catForm');
    Route::get('/add-sub-category','subCategoryForm')->name('subCatForm');
    Route::get('/add-products','productForm')->name('productForm');
    Route::get('/add-sub-child-category','childCatForm')->name('childCatForm');

    Route::get('/edit-categories','editCategories')->name('editCategories');
    Route::get('/view-category/{id}','viewCategory')->name('viewCategory');
});

// Data Manage
Route::controller(DataManageController::class)->group(function(){
    
});

//Product Redirection
Route::get('/searching-product/{id}',[ProductController::class,'searching_product']);

Route::fallback(function(){
    return view('404');
});

//Data Entry
Route::controller(DataEntryController::class)->group(function(){
    Route::post('/insert-category','insertCategory');
    Route::post('/insert-sub-category','insertSubCategory')->name('insertSubCat');
    Route::post('/insert-product','insertProduct')->name('insertProduct');
    Route::post('/insert-sub-child','insertSubChild')->name('insertSubChild');
});

Route::get('/{category}/{sub_category?}/{sub_child_cat?}',[CategoryController::class,'dymanic']);    