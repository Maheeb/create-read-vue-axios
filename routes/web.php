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

Route::get('/', function () {
    return view('welcome');
});


Route::get('information/create','InformationController@create');
//Route::post('information','InformationController@store');
Route::post('information/post',[
    'as'=> 'information.post',
    'uses'=> 'InformationController@store'
    ]);
