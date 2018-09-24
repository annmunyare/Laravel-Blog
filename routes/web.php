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

Route::get('/posts',  'PostController@index');
Route::get('/posts/create',  'PostController@create');
Route::post('/posts',  'PostController@store');
Route::get('/posts/edit/{id}',  'PostController@edit');
Route::patch('/posts/{id}',  'PostController@update');
Route::get('/posts/delete/{id}',  'PostController@destroy');

Route::get('/categories',  'CategoryController@index');
Route::get('/categories/create',  'CategoryController@create');
Route::post('/categories',  'CategoryController@store');
Route::get('/categories/edit/{categoryId}',  'CategoryController@edit');
Route::patch('/categories/{categoryId}',  'CategoryController@update');
Route::get('/categories/delete/{categoryId}',  'CategoryController@destroy');

// Route::get('/categories', ['uses' => 'CategoriesController@index','as' => 'categories']);
// Route::get('/categories/children', ['uses' => 'CategoriesController@children','as' => 'categories.children']);

Route::get('/posts/comments/{id}',  'PostController@comments');
Route::post('/comments', 'CommentController@store');
Route::patch('/comments/{post}/{id}',  'CommentController@update');
Route::get('/comments/{id}',  'CommentController@destroy');


  


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
