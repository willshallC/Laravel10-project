<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
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

    //handling dynamic routes
    function test($category, $sub_category = null){

        if($category != null){

            $catID = "";
            if($sub_category == null){

                
                
                $string = strtolower(trim($category));
                $cleanCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $string);
                
                $categoryID = DB::table('categories')->where('cat_name',$cleanCategory)->pluck('id');
                $catID =  $categoryID[0];
                //  $sub_categories = DB::table('sub_categories')->where('parent_id','=',$catID)->get();
                $sub_categories = DB::table('sub_categories AS sc')
                ->leftJoin('products AS p', function ($join) use ($catID) {
                    $join->on('sc.id', '=', 'p.fscid')
                        ->where('p.fcid', '=', $catID);
                })
                ->select('sc.*', DB::raw('COUNT(p.id) AS total'))
                ->groupBy('sc.id')
                ->where('sc.parent_id', '=', $catID)
                ->get();
            
           
            
  
                // $cat_name = DB::table('categories')->where('id','=',$id)->pluck('cat_name');
                $count = count($sub_categories);
                if($count == 0){

                    $products = DB::table('products')->where('fcid','=',$catID)->get();
                    return view('product',['products'=>$products, 'cat_name'=>$category, 'sub_cat_name'=>"" ]);

                }else{
                    //return view('sub-categories',['sub_categories'=>$sub_categories,'cat_name'=>$cat_name]);
                    // return view('sub-categories')->with('sub_categories',$sub_categories)->with('cat_name',$cat_name);
                    
                    return view('sub-categories',['sub_categories'=>$sub_categories, 'cat_name'=>$cleanCategory]);
                }
                
            }
            else{

                

                $stringCat = strtolower(trim($category));
                $cleanCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringCat);

                $stringSubCat = strtolower(trim($sub_category));
                $cleanSubCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringSubCat);
                
                $subCatId = DB::table('sub_categories')->where('sub_cat_name','=',$cleanSubCategory)->pluck('id');
                $subID = $subCatId[0];
                
                $products = DB::table('products')->where('fscid','=',$subID)->get();
                $products_count = count($products);
                // if($products_count>0){
                //     return view('product',['products'=>$products]);
                // }
                // else{
                //     $products = DB::table('products')->where('fcid','=',$catID)->get();
                //     return view('product',['products'=>$products]);
                    
                // }
                return view('product',['products'=>$products,'cat_name'=>$cleanCategory,'sub_cat_name'=>$cleanSubCategory]);
            
            }
        }
    }

    function dymanicEntory($category, $sub_category=null, $sub_child_cat=null){

        if($sub_category == null){

            $string = strtolower(trim($category));
            $cleanCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $string);
            $categoryID = DB::table('categories')->where('cat_name',$cleanCategory)->pluck('id');
            $catID =  $categoryID[0];
            //  $sub_categories = DB::table('sub_categories')->where('parent_id','=',$catID)->get();
            $sub_categories = DB::table('sub_categories AS sc')
            ->leftJoin('products AS p', function ($join) use ($catID) {
                $join->on('sc.id', '=', 'p.fscid')
                    ->where('p.fcid', '=', $catID);
            })
            ->select('sc.*', DB::raw('COUNT(p.id) AS total'))
            ->groupBy('sc.id')
            ->where('sc.parent_id', '=', $catID)
            ->get();
        
       
        

            // $cat_name = DB::table('categories')->where('id','=',$id)->pluck('cat_name');
            $count = count($sub_categories);
            if($count == 0){

                $products = DB::table('products')->where('fcid','=',$catID)->get();
                return view('product',['products'=>$products, 'cat_name'=>$category, 'sub_cat_name'=>"" ]);

            }else{
                //return view('sub-categories',['sub_categories'=>$sub_categories,'cat_name'=>$cat_name]);
                // return view('sub-categories')->with('sub_categories',$sub_categories)->with('cat_name',$cat_name);
                
                return view('sub-categories',['sub_categories'=>$sub_categories, 'cat_name'=>$cleanCategory]);
            }
        }
        else{
            if($sub_child_cat == null){
                
                $stringCat = strtolower(trim($category));
                $cleanCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringCat);

                $stringSubCat = strtolower(trim($sub_category));
                $cleanSubCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringSubCat);
                
                $subCatId = DB::table('sub_categories')->where('sub_cat_name','=',$cleanSubCategory)->pluck('id');
                $subID = $subCatId[0];

                $sub_child_categories = DB::table('sub_child_categories')->select('*')->where('sub_parent_id','=',$subID)->get();
                
                $count = count($sub_child_categories);
                if($count==0){
                    $stringCat = strtolower(trim($category));
                    $cleanCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringCat);

                    $stringSubCat = strtolower(trim($sub_category));
                    $cleanSubCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringSubCat);
                    
                    $subCatId = DB::table('sub_categories')->where('sub_cat_name','=',$cleanSubCategory)->pluck('id');
                    $subID = $subCatId[0];
                    
                    $products = DB::table('products')->where('fscid','=',$subID)->get();
                    $products_count = count($products);
                    // if($products_count>0){
                    //     return view('product',['products'=>$products]);
                    // }
                    // else{
                    //     $products = DB::table('products')->where('fcid','=',$catID)->get();
                    //     return view('product',['products'=>$products]);
                        
                    // }
                    return view('product',['products'=>$products,'cat_name'=>$cleanCategory,'sub_cat_name'=>$cleanSubCategory]);
                }
                else{
                    return view('sub-child-categories',['sub_child_categories'=>$sub_child_categories]);
                }
            }
            else{
                $stringCat = strtolower(trim($category));
                $cleanCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringCat);

                $stringSubCat = strtolower(trim($sub_category));
                $cleanSubCategory = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringSubCat);

                $stringChildCat = strtolower(trim($sub_child_cat));
                $cleanChildCat = preg_replace('/[^A-Za-z0-9]+/', ' ', $stringChildCat);

                $subChildId = DB::table('sub_child_categories')->where('sub_child_name','=',$cleanChildCat)->pluck('id');
                $childId = $subChildId[0];

                $products = DB::table('products')->where('fsccid','=',$childId)->get();
                $products_count = count($products);
                return view('product',['products'=>$products,'cat_name'=>$cleanCategory,'sub_cat_name'=>$cleanSubCategory]);
                return $cleanCategory . $cleanSubCategory . $cleanChildCat;
            }
        }
    }
}
