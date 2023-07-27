<?php

namespace App\Http\Controllers;
use App\Models\Sub_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;

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
        
        // $categories = DB::table('categories')->select(['id','cat_name'])->where('has_child','=','1')->get();
        $categories = Categorie::select(['id','cat_name'])->where('has_child','=','1')->where('cat_slug','!=','miscellaneous')->get();
        return view('add_sub_cat',['categories'=>$categories]);
    }

    //sub child category form
    function childCatForm(){

        $subCategories = Sub_categorie::select(['id','sub_cat_name'])->where('sub_child','=',1)->get();
        return view('add_sub_child_cat',['subCategories'=>$subCategories]);
    }
    //product Form
    function productForm(){
        $categories = DB::table('categories')->select(['id','cat_name'])->where('cat_slug','!=','miscellaneous')->get();
        $subCategories = DB::table('sub_categories')->select(['id','parent_id','sub_cat_name'])->get();
        $subChildCategories = DB::table('sub_child_categories')->select(['id','sub_parent_id','sub_child_name'])->get();
        return view('add_products',['categories'=>$categories,'subCategories'=>$subCategories,'subChildCategories'=>$subChildCategories]);
    }


    //edit categories
    function editCategories(){
        $categories = Categorie::where('cat_slug','!=','miscellaneous')->get();
        return view('edit_categories',['categories' => $categories]);
    }
    //view Category
    function viewCategory($id){
        $category = Categorie::where('id','=',$id)->first();
        return view('view_category',['category'=>$category]);
    }

    //edit sub categories
    function editSubCategories(){
        $subCategories = Sub_categorie::get();
        return view('edit_sub_categories',['subcategories'=>$subCategories]);
    }

    //view sub category
    function viewSubCategories($id){
        $subCat = Sub_categorie::where('id',$id)->first();
        return view('view_sub_category',['subCategory'=>$subCat]);
    }

    //edit sub child
    function edit_Sub_Child(){
        $subChild = DB::table('sub_child_categories')->get();
        return view('edit_sub_child',['subChild'=>$subChild]);
    }
    //view sub child
    function view_child_category($id){
        $subChild = DB::table('sub_child_categories')->where('id',$id)->first();
        return view('view_sub_child',['subChild'=>$subChild]);
    }

    //select product type
    function select_product_type(){
        $categories = DB::table('categories')->select(['id','cat_name'])->where('cat_slug','!=','miscellaneous')->get();
        $subCategories = DB::table('sub_categories')->select(['id','parent_id','sub_cat_name'])->get();
        $subChildCategories = DB::table('sub_child_categories')->select(['id','sub_parent_id','sub_child_name'])->get();
        return view('select_product_type',['categories'=>$categories,'subCategories'=>$subCategories,'subChildCategories'=>$subChildCategories]);
    }
    // show selected product type
    function select_product_show(Request $req){
        if($req->product_subcat=="null"){
            
            $req->product_subcat = null;
            $req->child_sub_cat = null;
                
        }
        else if($req->child_sub_cat=="null"){
            $req->child_sub_cat=null;
        }
        $products = DB::table('products')->where('fcid',$req->product_cat)->where('fscid',$req->product_subcat)->where('fsccid',$req->child_sub_cat)->get();
        return view('edit_products',['products'=>$products]);
    }
    //view product
    function view_product($id){
        $product = DB::table('products')->where('id',$id)->first();
        $categories = DB::table('categories')->select(['id','cat_name'])->get();
        $subCategories = DB::table('sub_categories')->select(['id','sub_cat_name','parent_id'])->get();
        $subChildCategories = DB::table('sub_child_categories')->select(['id','sub_child_name','sub_parent_id'])->get();
        return view('view_product',['product'=>$product, 'categories'=>$categories, 'subCategories'=>$subCategories,'subChildCategories'=>$subChildCategories]);
    }
}