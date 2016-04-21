<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::get('/user', 'UserController@index');

Route::controller('/forecast', 'ForecastController');
//Route::get('/forecast', 'ForecastController');

//Route::controller('/prediction', 'PredictionController');

Route::get('/forecast/analysis', function () {
    return 'Hello World!!';
});

//Route::controller('/user', 'UserController');
//Route::controller('/user', 'HelloController');

/*
Route::get('/user', function () {

//http://b10.local/user?id=001&name=VVVV
//    return '<H1>Hello World</H1><span>'.$_GET['id'].$_GET['name'].'WWWWWW</span>';

//    $param = Input::only('id', 'name');
//    return '<H1>Hello World</H1><span>'.$param['id'].$param['name'].'WWWWWWWWW</span>';

//    $param = Input::get('id');
//    return '<H1>Hello World</H1><span>'.$param.'WWWWWWWWW</span>';

    $param = Request::get('id');
    return '<H1>Hello World</H1><span>'.$param.'WWWWWWWWW</span>';

});
*/
