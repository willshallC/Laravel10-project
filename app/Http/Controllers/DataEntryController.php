<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Sub_categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    //for adding Category
    function insertCategory(Request $req){
    
        $Category = DB::table('categories')->insert(
            [
                'cat_name' => $req->cat_name,
                'cat_slug' => $req->cat_slug,
                'cat_status' => $req->status,
                'top_cat' => $req->top_cat,
                'cat_img' => $req->cat_img,
                'has_child'=> $req->cat_child,
                'cat_description' => $req->cat_description 
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
                'sub_cat_slug' => $req->sub_cat_slug,
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
        
        $subChild = DB::table('sub_child_categories')->insert(
            [
                'sub_child_name' => $req->sub_child_name,
                'sub_child_slug' => $req->sub_child_slug,
                'sub_child_img' => $req->sub_child_img,
                'sub_status' => $req->sub_child_status,
                'sub_parent_id' => $req->parent_sub_cat
            ]
        );
        if($subChild){
            return redirect('/');
        }
        else{
            return "<h1>Something went wrong</h1>";
        }
    }

    //for adding products
    function insertProduct(Request $req){

        if($req->product_subcat=="null"){
            
            $req->product_subcat = null;
            $req->child_sub_cat = null;

            $checkChild = Categorie::where('id',$req->product_cat)->where('has_child','1')->get();
            if(count($checkChild)>0){
                $checkSubCat = Sub_categorie::where('parent_id',$req->product_cat)->get();
                if(count($checkSubCat)==0){
                    return "cannot add product";
                }
            }
                
        }
        else if($req->child_sub_cat=="null"){
            $req->child_sub_cat=null;

            $chechkSubChild = Sub_categorie::where('id', $req->product_subcat)->where('sub_child',1)->get();
            if(count($chechkSubChild)>0){
                $checkChildSub = DB::table('sub_child_categories')->where('sub_parent_id',$req->product_subcat)->get();
                if(count($checkChildSub)==0){
                    return "Product cant be added";
                }
            }
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
                'fscid' => $req->product_subcat,
                'fsccid' => $req->child_sub_cat
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
