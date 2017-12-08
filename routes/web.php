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
    return view('frontend.welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Frontend
Route::get('/disclaimer', 'DisclaimerController@index')->name('disclaimer.index');

// Logs routes
Route::get('/admin/logs', 'LogsController@index')->name('admin.logs.index');

// User routes
Route::get('/admin/users', 'usersController@index')->name('admin.users.index');
Route::get('/admin/gebruiker/nieuw', 'usersController@create')->name('admin.users.create');
Route::get('/admin/gebruiker/verwijder/{id}', 'usersController@destroy')->name('admin.users.delete');
Route::post('/admin/gebruiker/opslaan', 'usersController@store')->name('admin.users.store');

// Article routes (backend)
Route::get('admin/artikels', 'Backend\ArticleController@index')->name('admin.articles.index');
Route::get('admin/artikels/nieuw', 'Backend\ArticleController@create')->name('admin.articles.create');