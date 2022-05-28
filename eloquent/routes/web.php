<?php

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

use App\User;
use App\Post;
use App\city;

Route::get('/', function () {
    return view('welcome');
});

Route::get('city/{id}/post',function ($id){
    $city = city::find($id);

    foreach ($city->posts as $post){
        echo $post->title . "<br>";
    };
});

Route::get('/user/{id}/role',function ($id){
    $user = User::find($id);
    echo $user->name . "<br>";

    foreach ($user->roles as $role){
        echo $role->rank;
    }
});
Route::get('/post/insert',function (){
    Post::create(['user_id'=>2,'title'=>'fourth Post','content'=>'this is the fourth post of our website']);
});

Route::get('/posts',function (){
    $posts = Post::all();
    foreach ($posts as $post){
        echo $post->title . "<br>";
        echo $post->content . "<hr>";
    }
});

Route::get('/user/{id}/post',function ($id){
    $user = User::where('id',$id)->firstOrFail();
    echo $user->name .'<br>';

    foreach ($user->posts as $post){
        echo $post->title . "<br>";
    }
});

Route::get('/user/{id}/city',function ($id){
    $user= User::where('id',$id)->firstOrFail();
    echo $user->name . "....<br> <strong>";
    echo $user->city->name . "</strong>";
});

Route::get('/post/{id}/show',function ($id){
    $post = Post::find($id);
    echo $post->content . "<br>";
    echo $post->user->email;

});

Route::get('/user/insert',function (){
    /*$user = new User();
    $user->name = "hein wai yan htet";
    $user->email= "heinwaiyanhtet20042020@gmail.com";
    $user->password=Hash::make('123123123');
    $user->save();
    */
    $pass = Hash::make('123123123');
    User::create(["name"=>"hein htet","email"=>"heinhtet2020@gmail.com","password"=>$pass]);
});
