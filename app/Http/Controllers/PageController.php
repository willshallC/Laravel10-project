<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    function about(){
        return view('about');
    }

    function posts(){
        return view('post');
    }

    function categoryForm(){
        return view('add_cat_data');
    }

    //sub-category Form
    function subCategoryForm(){
        $categories = DB::table('categories')->select(['id','cat_name'])->get();
        return view('add_sub_cat',['categories'=>$categories]);
    }

    //product Form
    function productForm(){
        return view('add_products');
    }
}