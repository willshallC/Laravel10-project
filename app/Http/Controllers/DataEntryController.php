<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    //for adding Category
    function insertCategory(Request $req){
        $Category = DB::table('categories')->insert(
            [
                'cat_name' => $req->cat_name,
                'cat_status' => $req->status,
                'top_cat' => $req->top_cat,
                'cat_img' => $req->cat_img 
            ]
        );

        if($Category){
           return redirect('/');
        }
        else{
            return "<h1>Something went wrong</h1>";
        }
    }

    //for adding sub-category
    function insertSubCategory(Request $req){
        $subCategory = DB::table('sub_categories')->insert(
            [
                'sub_cat_name' => $req->sub_cat_name,
                'parent_id' => $req->parent_id,
                'sub_cat_img' => $req->sub_cat_img,
                'sub_cat_status'=> $req->sub_cat_status
            ]
        );

        if($subCategory){
            return redirect('/');
        }
        else{
            return "<h1>Something went wrong</h1>";
        }
    }

    //for adding products
    function insertProduct(Request $req){
        return $req;
        // $product = DB::table('products')->insert(
        //     [

        //     ]
        // );
    }
}
