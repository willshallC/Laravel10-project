<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataManageController extends Controller
{
    //edit single category
    function editCat(Request $req){
        $category = DB::table('categories')->where('id','=',$req->cat_id)
                    ->update([
                        'cat_name' => $req->cat_name,
                        'cat_slug' => $req->cat_slug,
                        'cat_status' => $req->cat_status,
                        'top_cat' => $req->top_cat,
                        'cat_img' => $req->cat_img,
                        'cat_description' => $req->cat_description
                    ]);
        if($category){
            return redirect('edit-categories');
        }
        else{
            return "Something went wrong";
        }
    }
    //delete single category
    function delCat($id){
        $unCat = DB::table('categories')->where('cat_slug','miscellaneous')->pluck('id');
        $unCatId = $unCat->first();

        $categoryCheck = DB::table('categories')->where('id','=',$id)->pluck('has_child');
        $check = $categoryCheck->first();
        if($check){
            $productsChecks = DB::table('products')->where('fcid',$id)->get();
            if(count($productsChecks)>0){
                $products = DB::table('products')->where('fcid',$id)->update([
                    'fcid' => $unCatId
                ]);
                $subCategories = DB::table('sub_categories')->where('parent_id',$id)->update([
                    'parent_id' => $unCatId
                ]);
                $category = DB::table('categories')->where('id','=',$id)->delete();
        
                if($products && $subCategories && $category){
                    return redirect('edit-categories');
                }
                else{
                    return "something went wrong";
                }
            }
            else{
                $subCategories = DB::table('sub_categories')->where('parent_id',$id)->update([
                    'parent_id' => $unCatId
                ]);
                $category = DB::table('categories')->where('id','=',$id)->delete();
        
                if($subCategories && $category){
                    return redirect('edit-categories');
                }
                else{
                    return "something went wrong";
                }
            }
            
        }
        else{
            $productsChecks = DB::table('products')->where('fcid',$id)->get();
            if(count($productsChecks)>0){
                $products = DB::table('products')->where('fcid',$id)->update([
                    'fcid' => $unCatId
                ]);
                $category = DB::table('categories')->where('id','=',$id)->delete();
                if($products && $category){
                    return redirect('edit-categories');
                }
                else{
                    return "something went wrong";
                }
            }
            else{
                $category = DB::table('categories')->where('id','=',$id)->delete();
                if( $category){
                    return redirect('edit-categories');
                }
                else{
                    return "something went wrong";
                }
            }
            
        }    
    }

    //edit single sub category
    function editSubCat(Request $req){
        $subCat = DB::table('sub_categories')->where('id',$req->id)->update(
            [
                'sub_cat_name' => $req->sub_cat_name,
                'sub_cat_slug' => $req->sub_cat_slug,
                'sub_cat_img' => $req->sub_cat_img,
                'sub_cat_status' => $req->sub_cat_status
            ]
        );
        if($subCat){
            return redirect('/edit-sub-categories');
        }
        else{
            return "something went wrong";
        }
    }

    //edit single sub child category
    function edit_child_cat(Request $req){

        $childCat = DB::table('sub_child_categories')->where('id',$req->id)->update(
            [
                'sub_child_name' => $req->child_name,
                'sub_child_slug' => $req->child_slug,
                'sub_child_img' => $req->child_img,
                'sub_status' => $req->child_status
            ]
        );
        if($childCat){
            return redirect('/edit-sub-child');
        }
        else{
            return "something went wrong";
        }
    }
}
