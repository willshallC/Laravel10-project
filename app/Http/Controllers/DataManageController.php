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
        $category = DB::table('categories')->where('id','=',$id)->delete();
    }
}
