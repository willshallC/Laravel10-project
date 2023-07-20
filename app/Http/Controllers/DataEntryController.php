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
                'cat_img' => $req->cat_img,
                'has_child'=> $req->cat_child 
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
                'sub_cat_status'=> $req->sub_cat_status,
                'sub_child' => $req->sub_child
            ]
        );

        if($subCategory){
            return redirect('/');
        }
        else{
            return "<h1>Something went wrong</h1>";
        }
    }

    //for sub child category
    function insertSubChild(Request $req){
        return $req;
    }

    //for adding products
    function insertProduct(Request $req){
        if($req->product_subcat=="null"){
            $req->product_subcat=null;
        }
        $product = DB::table('products')->insert(
            [
                'product_name'=> $req->product_name,
                'product_description' => $req->description,
                'product_price' => $req->product_price,
                'product_img' => $req->product_img,
                'product_status' => $req->product_status,
                'product_brand' => $req->product_brand,
                'product_link' => $req->product_link,
                'fcid' => $req->product_cat,
                'fscid' => $req->product_subcat
            ]
        );

        if($product){
            return redirect('/');
        }
        else{
            return "<h1>Something went wrong....</h1>";
        }
    }
}
