<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get('/blog/post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('/blog/post/category/{category}', 'HomeController@category')->name('category');
});

// admin routes
Route::group(['namespace' => 'Admin', 'middleware'=>'auth:admin'], function () {
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/user', 'UserController');
    Route::get('/admin/home', 'HomeController@index');
    Route::get('/posts/check_slug', 'PostController@check_slug')
  ->name('posts.check_slug');
});

Route::get('/admin-login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin-login', 'Admin\Auth\LoginController@login');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
