<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function searching_product($id){
        $product = DB::table('products')->select('product_link')->where('id','=',$id)->first();
        return redirect($product->product_link);
    }
}
