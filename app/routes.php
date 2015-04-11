<?php

use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','AreaController@getAreaView');

Route::get('/main','MainController@getMainView'); 

Route::post('action','ActionControllers@doWork');

Route::get('/login','AreaController@getAreaView');
