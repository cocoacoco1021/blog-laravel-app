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

//All the routes we need for Authentication
//To view all the routes, type the command php artisan route:list
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//For making a post
Route::post('/post', 'PostController@store');

Route::get('/posts/{id}/edit', 'PostController@edit')->name('edit');

Route::patch('/posts/{id}/update', 'PostController@update')->name('update');

Route::delete('/posts/{id}/delete', 'PostController@delete')->name('delete');

// Route::get('/users/index', 'UserController@index')->middleware('auth')->name('index');

Route::get('/users/index', 'UserController@index')->name('index');

Route::get('/users/{id}/show', 'UserController@show')->name('show');

Route::get('/users/edit', 'UserController@edit')->name('edit');

Route::patch('/users/update', 'UserController@update')->name('update');

Route::get('/users/changeAvatar', 'UserController@changeAvatar')->name('changeAvatar');

Route::patch('/users/uploadAvatar', 'UserController@uploadAvatar')->name('uploadAvatar');

Route::get('/follow/{followed_id}', 'UserController@follow')->name('user.follow');

Route::get('/unfollow/{followed_id}', 'UserController@unfollow')->name('user.unfollow');

Route::get('/users/{id}/following', 'UserController@following')->name('user.following');

Route::get('/users/{id}/followers', 'UserController@followers')->name('user.followers');
