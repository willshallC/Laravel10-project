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

    //edit product
    function edit_product(Request $req){

        if($req->product_subcat=="null"){
            
            $req->product_subcat = null;
            $req->child_sub_cat = null;
                
        }
        else if($req->child_sub_cat=="null"){
            $req->child_sub_cat=null;
        }
    
        $product = DB::table('products')->where('id',$req->id)->update(
            [
                'product_name' =>$req->product_name,
                'product_description' =>$req->description,
                'product_price' =>$req->product_price,
                'product_img' =>$req->product_img,
                'product_status' =>$req->product_status,
                'product_brand' =>$req->product_brand,
                'product_link' =>$req->product_link,
                'fcid' =>$req->product_cat,
                'fscid' =>$req->product_subcat,
                'fsccid' =>$req->child_sub_cat,
            ]
        );
        if($product){
            return redirect('/select-product-type');
        }
        else{
            return "something went wrong";
        }
    }

    //delete product 
    function delete_product($id){
        $product = DB::table('products')->where('id',$id)->delete();
        if($product){
            return redirect('/select-product-type');
        }
        else{
            return "something went wrong";
        }
    }

    //update page
    function update_page(Request $req){
        $page = DB::table('pages')->where('id',$req->id)->update(
            [
                'title' => $req->page_title,
                'slug' => $req->page_slug,
                'description' => $req->description,
                'image' => $req->img,
                'page_template' => $req->page_template,
                'seo_title' => $req->seo_title,
                'meta_description' => $req->meta_description,
                'published' => $req->publish,
                'page_schema' => $req->page_schema,
                'seo_image' => $req->seo_img,
                'indexed' => $req->indexed
            ]
        );
        if($page){
            return redirect('/edit-page');
        }
        else{
            return "something went wrong";
        }
    }
    //delete page
    function delete_page($id){
        $page = DB::table('pages')->where('id',$id)->delete();
        if($page){
            return redirect('/edit-page');
        }
        else{
            return "something went wrong";
        }
    }
}
