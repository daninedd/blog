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

//Route::group(["prefix" => "api", "namespace" => "Api"], function(){
//    Route::resource('dogs', 'DogsController');
//});

//Route::get('/login',['as'=>'login','uses'=>'ApiController@index']);

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::post('form',function(\Illuminate\Http\Request $request){

});


//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/login', 'HomeController@create')->name('login');
