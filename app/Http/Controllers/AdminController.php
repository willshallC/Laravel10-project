<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //dashboard
    function admin_login(){
        return view('login');
    }

    //page creation
    function create_page(){
        $templates = DB::table('templates')->get();
        return view('create_page',['templates'=>$templates]);
    }
}
