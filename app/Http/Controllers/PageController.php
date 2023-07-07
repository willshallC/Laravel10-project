<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    function about(){
        return view('about');
    }

    function posts(){
        return view('post');
    }
}