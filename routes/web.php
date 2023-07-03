<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[PageController::class,'home_cat']);
//Route::get('/{name}',[PageController::class,'test']);
Route::get('/sub-categories/{id}',[PageController::class,'sub_cat']);
Route::get('/product/{id}',[PageController::class,'products'])->name('products');


function getArray(){
    return ([
        1=>["name"=>"Reyna", "age"=>"29", "country"=>"Mexico"],
        2=>["name"=>"Jett", "age"=>"28", "country"=>"South Korea"],
        3=>["name"=>"Viper", "age"=>"30", "country"=>"America"],
        4=>["name"=>"Sage", "age"=>"31", "country"=> "China"]
    ]);
}



Route::get('/second',function(){
    return view('second');
});
//or
//Route::view('/second','second');


Route::get('/posts',function(){
    return view('post');
})->name('posty');


// redirection
Route::redirect('/hello','/');


// Route::get('/post/{id?}',function($id=null){
//     if($id){
//         return "<h1>POST ID: $id</h1>";
//     }
//     else{
//         return "<h1>No POST ID</h1>";
//     }
// })->whereIn('id',['oni','chan','yamate']);

Route::fallback(function(){
    return view('404');
});

Route::get('/control',function(){
    return view('control-struct');
});

Route::get('/about',function(){
    return view('about');
});

Route::get('/js',function(){
    return view('js');
});

Route::get('/users',function(){
    $data = "Amigo";
    // return view('users',['val'=>'Value passed from Route','sec'=>$data]);

    // return view('users')->with('val','value passed')
    // ->with('sec',$data);

    // return view('users')->withVal('Hola')->withSec($data);

    $names = [
        1=>["name"=>"Reyna", "age"=>"29", "country"=>"Mexico"],
        2=>["name"=>"Jett", "age"=>"28", "country"=>"South Korea"],
        3=>["name"=>"Viper", "age"=>"30", "country"=>"America"],
        4=>["name"=>"Sage", "age"=>"31", "country"=> "China"]
    ];

    return view('users',["names"=>$names]);
});

Route::get('/user/{id}',function($id){
    $users = getArray();
    $user = $users[$id];

    return view('user',['user'=>$user]);
})->name("single-user");

//Route::get('/kroom',[Pagecontroller::class,'show']);

Route::get('/add-category',function(){
    return view('add_cat_data');
});
Route::get('/add-sub-category',function(){
    return view('add_sub_cat');
});
Route::get('/add-products',function(){
    return view('add_products');
});