<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    function admin_login(){
        return view('login');
    }
}
