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
        return view('add_sub_cat');
    }

    //product Form
    function productForm(){
        return view('add_products');
    }
}