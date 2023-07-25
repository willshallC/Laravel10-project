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
}