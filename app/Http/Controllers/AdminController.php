<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    //dashboard
    function admin_login(){
        return view('login');
    }

    //auth
    function authenticate(Request $req){
        
    }
    //admin dashboard
    function dashboard(){
        return view('admin_dashboard');
    }
    //sign in
    function sign_in(Request $req){

        // $validator = validator::make($req->all(),[
        //     'email' =>'required|email',
        //     'password'=>'required'
        // ]);
        // if($validator->passes()){
        //     if(Auth::guard('admin')->attempt(['email'=> $req->email,'passowrd'=>$req->password],$req->get('remember'))){
        //         return redirect()->route('adminDashboard');
        //     }else{
        //         return redirect('/');
        //     }
        // }
        // else{
        //     return redirect('/');
        // }
        if(Auth::guard('admin')->attempt(['email'=> $req->mail,'password'=>$req->password,'role'=>1],$req->get('remember'))){
            return redirect()->route('adminDashboard');
        }else{
            return redirect('/');
        }
        //-------------------
        // $req->validate(
        //     [
        //         'email'=>'required|unique:users',
        //         'password'=>'required'
        //     ]
        // );
        // if(Auth::attempt($req->only('email','password'))){
        //     return redirect(route('adminDashboard'));
        // }
        // else{
        //     return redirect(route('login'))->withErrors('Login details are not valid');
        // }
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
    //delete user
    function delete_user($id){
        $user = DB::table('users')->where('id',$id)->delete();
        if($user){
            return redirect(route('allUsers'));
        }
        else{
            return "something went wrong";
        }
    }
    //edit single user
    function edit_single_user(Request $req){
        
        $user = DB::table('users')->where('id',$req->id)->update(
            [
                'first_name' => $req->f_name,
                'last_name' => $req->l_name,
                'username' => $req->user_name,
                'email' => $req->mail,
                'role' => $req->role,
                'phone' => $req->phone,
                'address' => $req->address,
                'slug' =>$req->slug,
                'logo' => $req->logo,
                'meta_title'=> $req->meta_title,
                'meta_description' => $req->meta_description,
                'schema' => $req->schema,
                'relation' => $req->relation,
                'active' => $req->active,
                'index' => $req->index,
                'feed_url' => $req->feed,
                'feed_active' => $req->feed_active,
                'website' => $req->website,
                'updated_at' => now(),
            ]
        );

        if($user){
            return redirect(route('allUsers'));
        }
        else{
            return "something went wrong";
        }
    
    }

    //add blog
    function add_blog(){
        $categories = DB::table('categories')->select(['id','cat_name'])->get();
        $authors = DB::table('users')->select(['id','first_name','last_name'])->get();
        
        return view('add_blog',['categories'=>$categories, 'authors'=>$authors]);
    }

    // insert blog
    function insert_blog(Request $req){
        $blog = DB::table('blogs')->insert(
            [
                'title' => $req->title,
                'slug' => $req->slug,
                'excerpt'=> $req->excerpt,
                'description' => $req->description,
                'image' => $req->image,
                'author' => $req->author,
                'category' => $req->category,
                'seo_title' => $req->seo_title,
                'seo_image' => $req->seo_image,
                'meta_description' => $req->meta_description,
                'featured' => $req->featured,
                'index' => $req->index,
                'status' => $req->status,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        if($blog){
            return redirect(route('viewBlogs'));
        }
        else{   
            return "smothing went wrong";
        }
    }
    //view blogs
    function view_blogs(){
        $blogs = DB::table('blogs')->select('b.*','u.first_name as fname','c.cat_name')->from('blogs as b')->leftJoin('users as u','b.author','=','u.id')->leftJoin('categories as c','b.category','=','c.id')->get();
        
        return view('view_blogs',['blogs'=>$blogs]);
    }

    //edit blog
    function edit_blog($id){
        $blog = DB::table('blogs')->where('id',$id)->first();
        $categories = DB::table('categories')->select(['id','cat_name'])->get();
        $authors = DB::table('users')->select(['id','first_name'])->get();

        return view('edit_blog',['blog'=>$blog,'categories'=>$categories,'authors'=>$authors]);
    }

    //update blog
    function update_blog(Request $req){
        $blog = DB::table('blogs')->where('id',$req->id)->update(
            [
                
                'title' => $req->title,
                'slug' => $req->slug,
                'excerpt'=> $req->excerpt,
                'description' => $req->description,
                'image' => $req->image,
                'author' => $req->author,
                'category' => $req->category,
                'seo_title' => $req->seo_title,
                'seo_image' => $req->seo_image,
                'meta_description' => $req->meta_description,
                'featured' => $req->featured,
                'index' => $req->index,
                'status' => $req->status,
                'updated_at' => now()
            ]
        );
        if($blog){
            return redirect(route('viewBlogs'));
        }
        else{
            return "something went wrong";
        }
    }

    //delete blog 
    function delete_blog($id){
        $blog = DB::table('blogs')->where('id',$id)->delete();
        if($blog){
            return redirect(route('viewBlogs'));
        }
        else{
            return "Something went wrong";
        }
    }

    //add faq
    function add_faq(){
        $categories = Categorie::get();
        return view('add_faq',['categories'=>$categories]);
    }
    //insert FAQ
    function insert_faq(Request $req){
        $faq = DB::table('faqs')->insert(
            [
                'question' =>$req->question,
                'answer' => $req->answer,
                'category' => $req->category,
                'status' => $req->status,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        if($faq){
            return redirect(route('viewFaqs'));
        }
        else{
            return "something went wrong";
        }
    }
    //view FAQs
    function view_faqs(){
        $faqs = DB::table('faqs')->select('f.*','c.cat_name')->from('faqs as f')->leftJoin('categories as c','f.category','=','c.id')->get();
        return view('view_faqs',['faqs'=>$faqs]);
    }
    //edit faq
    function edit_faq($id){
        $categories = Categorie::get();
        $faq = DB::table('faqs')->select('f.*','c.cat_name','c.id as cat_id')->from('faqs as f')->leftJoin('categories as c','f.category','=','c.id')->where('f.id',$id)->first();
        return view('edit_faq',['categories'=>$categories, 'faq'=>$faq]);
    }
    //update faq
    function update_faq(Request $req){
        $faq = DB::table('faqs')->where('id',$req->id)->update(
            [
                'question' =>$req->question,
                'answer' => $req->answer,
                'category' => $req->category,
                'status' => $req->status,
                'updated_at' => now()
            ]
        );
        if($faq){
            return redirect(route('viewFaqs'));
        }
        else{
            return "something went wrong";
        }
    }
    //delete faq
    function delete_faq($id){
        $faq = DB::table('faqs')->where('id',$id)->delete();
        if($faq){
            return redirect(route('viewFaqs'));
        }
        else{
            return "something went wrong";
        }
    }
}
