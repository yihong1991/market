<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
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

Route::get('/love','MainController@getLoveView');

Route::get('/dbcity','DBController@insertCity');



Route::get('dbweb','DBController@insertWebs');

Route::get('dbrec','DBController@recMapAndInfo');

//Route::get('db/cma','DBController@mapView');

Route::get('test',function(){
    return View::make('pages.test');
});