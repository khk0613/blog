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

Route::get('/posts/{id}/delete','PostController@haha');
Route::resource('/posts','PostController');
// Route::resource('/posts', 'PostController', ['except' => [
//     'destroy'
// ]]);
// Route::get('/posts/{id}/delete', 'DeleteController@haha');
// Route::delete('/posts/{id}/delete', 'DeleteController@destroy');


Route::resource('/posts/{post_id}/comments', 'CommentController');
