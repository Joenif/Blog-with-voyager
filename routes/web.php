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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'MainController@index')->name('index');

// Post Routes
Route::get('/post/{slug}', 'PostController@read')->name('readPost');

// Category Routes
Route::get('/{slug}', 'PostController@category')->name('category');

// Search Routes
Route::post('/search', 'MainController@search')->name('search');










// Registration Routes...
Route::get('/admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/admin/register', 'Auth\RegisterController@register')->name('PostRegister');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

