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

Route::get('/','PageController@welcome')->name('welcome');


Route::get("/login","CustomController@login")->name('login');

Route::view("/passcode-login","passcode")->name('passcodeLogin');
Route::post("/passcodeLogin","CustomController@passcodeLogin")->name('passcodeLogin');

Route::post("/login","CustomController@loginAccount")->name('login');
Route::post("/logout","CustomController@logoutAccount")->name('logout');



Route::view("/varcode","varcode")->name('varcode');
Route::post("/upload","PageController@upload")->name("upload");
