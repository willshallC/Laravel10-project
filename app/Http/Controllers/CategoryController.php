<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    //home - categories
    function home_cat(){
        $categories = DB::table('categories')->where('top_cat',1)->Where('cat_status',1)->get();
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

    //handling dynamic routes
    function dymanic($category, $sub_category=null, $sub_child_cat=null){
        $categoryName = $subCatName = "";
        if($sub_category == null){
            
            $categoryData = DB::table('categories')->where('cat_slug',$category)->pluck('id','cat_name');
            $catID= $categoryData->first();
            $categoryName = $categoryData->keys()->first();
            
            $sub_categories = DB::table('sub_categories AS sc')
            ->leftJoin('products AS p', function ($join) use ($catID) {
                $join->on('sc.id', '=', 'p.fscid')
                    ->where('p.fcid', '=', $catID);
            })
            ->select('sc.*', DB::raw('COUNT(p.id) AS total'))
            ->groupBy('sc.id')
            ->where('sc.parent_id', '=', $catID)
            ->get();

            $count = count($sub_categories);
            if($count == 0){

                $products = DB::table('products')->where('fcid','=',$catID)->get();
                return view('product',['products'=>$products, 'cat_name'=>$categoryName, 'sub_cat_name'=>"" ]);

            }else{
                
                return view('sub-categories',['sub_categories'=>$sub_categories, 'cat_name'=>$categoryName]);
            }
        }
        else{
            if($sub_child_cat == null){

                $subCatData = DB::table('sub_categories')->where('sub_cat_slug','=',$sub_category)->pluck('id','sub_cat_name');
                $subCatId = $subCatData->first();
                $subCatName = $subCatData->keys()->first();

                $sub_child_categories = DB::table('sub_child_categories')->select('*')->where('sub_parent_id','=',$subCatId)->get();
                
                $count = count($sub_child_categories);
                if($count==0){
                    
                    $products = DB::table('products')->where('fscid','=',$subCatId)->get();
                    $products_count = count($products);
                    return view('product',['products'=>$products,'cat_name'=>$categoryName,'sub_cat_name'=>$subCatName]);
                }
                else{
                    return view('sub-child-categories',['sub_child_categories'=>$sub_child_categories]);
                }
            }
            else{

                $subChildData = DB::table('sub_child_categories')->where('sub_child_slug','=',$sub_child_cat)->pluck('id','sub_child_name');
                $childId = $subChildData->first();
                $childName = $subChildData->keys()->first();

                $products = DB::table('products')->where('fsccid','=',$childId)->get();
                $products_count = count($products);
                return view('product',['products'=>$products,'cat_name'=>$categoryName,'sub_cat_name'=>$subCatName]);
            }
        }
    }
}
