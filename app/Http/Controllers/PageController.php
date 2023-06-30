<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    //home - categories
    function home_cat(){
        $categories = DB::table('categories')->get();
        return view('welcome',['categories'=>$categories]);
    }

    function sub_cat($id){
        $sub_categories = DB::table('sub_categories')->where('parent_id','=',$id)->get();
        $count = count($sub_categories);
        if($count == 0){
            $products = DB::table('products')->where('fcid','=',$id);
            
            //Route::redirect('/sub-categories/{id}','/products/{id}');
            return view('product',['products'=>$products]);
            

        }else{
            return view('sub-categories',['sub_categories'=>$sub_categories]);
        }
        //return view('sub-categories',['sub_categories'=>$sub_categories]);
    }

    function products($id){
        $products = DB::table('products')->where('fscid','=',$id)->get();
        // if(empty($products)){
        //     $products = DB::table('products')->where('fcid','=',$id);
        //     return view('product',['products'=>$products]);
        // }else{
        //     return view('product',['products'=>$products]);
        // }
       return view('product',['products'=>$products]);
    }

    function test($name){
        return "<h1>$name</h1>";
    }
}