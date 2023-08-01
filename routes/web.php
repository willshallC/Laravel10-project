<?php

use App\Http\Controllers\AdminController;
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

//admin
Route::controller(AdminController::class)->group(function(){
    Route::get('/login','admin_login')->name('login');
    Route::get('/create-page','create_page')->name('createPage');
    Route::get('/edit-page','edit_page')->name('editPage');
    Route::get('/edit-single-page/{id}','edit_single_page')->name('editSinglePage');
});

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

    Route::get('/edit-sub-categories','editSubCategories')->name('editSubCat');
    Route::get('/view-sub-categories/{id}','viewSubCategories')->name('viewSubCat');

    Route::get('/edit-sub-child','edit_Sub_Child')->name('editSubChild');
    Route::get('/view-child-cat/{id}','view_child_category')->name('viewChildCat');

    Route::get('/select-product-type','select_product_type')->name('selectProductType');
    Route::post('/select-product-show','select_product_show')->name('selectProductShow');
    Route::get('/view-product/{id}','view_product')->name('viewProduct');
    
});

// Data Manage
Route::controller(DataManageController::class)->group(function(){
    Route::post('/edit-cat','editCat')->name('editCat');
    Route::get('/delCat/{id}','delCat');
    
    //sub category
    Route::post('/edit-sub-cat','editSubCat')->name('editSubCategory');

    //sub child category
    Route::post('/edit-child','edit_child_cat')->name('editChildCat');

    //Product
    Route::post('/edit-product','edit_product')->name('editProduct');
    Route::get('/delete-product/{id}','delete_product');

    //Page
    Route::post('/upade-page','update_page')->name('updatePage');
    Route::get('/delete-page/{id}','delete_page');
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
    //page
    Route::post('/add-page','add_page')->name('addPage');
});

Route::get('/{category}/{sub_category?}/{sub_child_cat?}',[CategoryController::class,'dymanic']);    