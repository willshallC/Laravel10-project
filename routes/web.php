<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
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

});


Route::fallback(function(){
    return view('404');
});



Route::get('/add-category',function(){
    return view('add_cat_data');
});
Route::get('/add-sub-category',function(){
    return view('add_sub_cat');
});
Route::get('/add-products',function(){
    return view('add_products');
});

Route::get('/{category}/{sub_category?}/{id?}',[CategoryController::class,'test']);    