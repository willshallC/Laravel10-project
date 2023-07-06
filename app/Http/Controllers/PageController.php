<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    //home - categories
    function home_cat(){
        $categories = DB::table('categories')->get();
        return view('welcome',['categories'=>$categories]);
    }

    function sub_cat($id){

        $sub_categories = DB::table('sub_categories')->where('parent_id','=',$id)->get();
        // $sub_categories = DB::select("select *, count(DISTINCT p.product_name) FROM sub_categories as sc join products as p  WHERE p.fcid = $id");
        // return $sub_categories;
        $cat_name = DB::table('categories')->where('id','=',$id)->pluck('cat_name');
        $count = count($sub_categories);
        if($count == 0){

            return redirect("product/{$id}");

        }else{
            //return view('sub-categories',['sub_categories'=>$sub_categories,'cat_name'=>$cat_name]);
            // return view('sub-categories')->with('sub_categories',$sub_categories)->with('cat_name',$cat_name);
            
            return view('sub-categories',['sub_categories'=>$sub_categories,'cat_name'=>$cat_name]);
        }
        //return view('sub-categories',['sub_categories'=>$sub_categories]);
    }

    function products($id){
        $products = DB::table('products')->where('fscid','=',$id)->get();
        $products_count = count($products);
        if($products_count>0){
            return view('product',['products'=>$products]);
        }
        else{
            $products = DB::table('products')->where('fcid','=',$id)->get();
            return view('product',['products'=>$products]);
            
        }
        //return view('product',['products'=>$products]);
       
    }
    function test($name, $sname = null, $id = null){
        if($name != null){
            if($sname == null){
                return $name;
            } 
            elseif($id == null){
                return $name;
            }
            else{
                return $name . $sname . $id;
            }
        }
    }
}