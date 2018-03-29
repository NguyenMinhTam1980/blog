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

Route::get('/product', 'ProductController@index');
Route::get('/product/{id}',
        ['as'=>'chitiet',
         'uses'=>'ProductController@detail']
        );
Route::get('/foo', function () {
    return 'Hello World';
});

Route::get('publish', function () {
    // Route logic...

    Redis::publish('test-channel', json_encode(['foo' => 'bar']));
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('products', 'ProductsController');