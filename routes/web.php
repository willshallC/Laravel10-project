<?php

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


Route::controller(PageController::class)->group(function(){
    Route::get('/','home_cat');
    Route::get('/sub-categories/{id}','sub_cat');
    Route::get('/product/{id}','products');
});

Route::get('/posts',function(){
    return view('post');
})->name('posty');


// redirection
Route::redirect('/hello','/');

Route::fallback(function(){
    return view('404');
});

Route::get('/about',function(){
    return view('about');
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

Route::get('/{name}/{sname?}/{id?}',[PageController::class,'test']);    