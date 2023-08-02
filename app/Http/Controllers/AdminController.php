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

    //edit pages
    function edit_page(){
        $pages = $page = DB::table('pages')->select('p.*', 't.template')->from('pages as p')->leftJoin('templates as t', 't.id', '=', 'p.page_template')->get();

        return view('edit_page',['pages'=>$pages]);
    }

    //edit single page
    function edit_single_page($id){
        $page = DB::table('pages')->where('id',$id)->first();
        $templates = DB::table('templates')->get();
        return view('single_page_edit',['page'=>$page, 'templates'=>$templates]);
    }

    //add users
    function add_users(){
        $roles = DB::table('roles')->get();
        
        return view('add_users',['roles'=>$roles]);
    }
    // all users
    function all_users(){
        $users = DB::table('users')->select('u.*','r.role_type')->from('users as u')->leftJoin('roles as r','u.role','=','r.id')->get();
        return view('all_users',['users'=>$users]);
    }
    //edit user
    function edit_user($id){
        $user = DB::table('users')->where('id',$id)->first();
        $roles = DB::table('roles')->get();
        
        return view('edit_user',['user'=>$user, 'roles'=>$roles]);
    }
}
