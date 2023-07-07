<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    
    function test($name, $sname = null, $id = null){
        if($name != null){
            if($sname == null){
                return $name;
            } 
            elseif($id == null){
                return $name;
            }
            else{
                return $name . $sname . $id;
            }
        }
    }
}