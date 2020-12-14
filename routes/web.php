<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
});

// User routes
Route::group(['namespace' => 'User'], function () {
    Route::get('/resume', 'HomeController@resume')->name('resume');
    Route::get('/', 'HomeController@blog')->name('blog');
    Route::get('/projects', 'HomeController@projects')->name('projects');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/blog/post/{post?}', 'PostController@show')->name('post');
    Route::get('/blog/post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('/blog/post/category/{category}', 'HomeController@category')->name('category');


    //vue routes

    Route::post('getPosts', 'PostController@getAllPosts');
    Route::post('saveLike', 'PostController@saveLike');
});

// admin routes
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/role', 'RoleController');
    Route::resource('admin/permission', 'PermissionController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/user', 'UserController');
    Route::get('/admin/home', 'HomeController@index');
    Route::get('/posts/check_slug', 'PostController@check_slug')
        ->name('posts.check_slug');
});

Route::get('/admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin-login', 'Admin\Auth\LoginController@login');


Auth::routes();


//404 page
Route::fallback(function () {
    return response()->view('errors.404');
});