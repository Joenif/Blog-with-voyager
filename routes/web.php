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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/admin/register', 'RegisterController@index')->name('register');;
Route::post('/admin/register', 'RegisterController@register')->name('PostRegister');
Route::post('logout', 'RegisterController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

