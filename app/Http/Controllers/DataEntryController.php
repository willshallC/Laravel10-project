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
                'cat_img' => $req->cat_img 
            ]
        );

        if($Category){
            redirect('/');
        }
        else{
            return "<h1>Something went wrong</h1>";
        }
    }
}
