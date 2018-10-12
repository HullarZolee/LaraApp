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

// Route::get('/users/{id}', function ($id) {
//      return 'Hello ' . $id;
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// posts
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/service', 'PagesController@service');
// Route::get('/posts', 'PostsController@index');
// Route::get('/posts/create', 'PostsController@create');
// Route::get('/posts/edit/{id}', 'PostsController@edit');

Route::resource('posts', 'PostsController');
// posts

//Route::resource('posts', 'PostsController');

// tickets
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/tickets', 'TicketsController@index')->middleware('admin');
Route::get('/ticket/{slug?}', 'TicketsController@show')->middleware('admin');
Route::get('/ticket/{slug?}/editor', 'TicketsController@editor')->name('tickets.editor');
Route::post('/ticket/{slug?}/editor', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy')->middleware('admin');

// commnents
Route::post('/comment', 'CommentsController@newComment');
// Route::post('/posts', 'CommentsController@storeToPost');

// Route::group(['domain' => 'api.' . URL::to('/')], function() {
//      Route::get('/', function() {

//     });
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
