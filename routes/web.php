<?php

use Illuminate\Support\Facades\Route;

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

// User routes
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/resume', 'HomeController@resume')->name('resume');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/projects', 'HomeController@projects')->name('projects');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/blog/post/{post?}','PostController@show')->name('post');
});

// admin routes
Route::group(['namespace' => 'Admin'], function () {
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/user', 'UserController');
    Route::get('/admin/home', 'HomeController@index');
});


