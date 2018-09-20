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

/*
Route::get('/hello', function () {
    return "hello bro , Whats Up !!";
});


Route::get('/users/{id}/{name}', function ($id,$name) {
    return 'This user name is '.$name.' with an ID of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/home','PagesController@home');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/food','FoodController@index');
Route::get('/drinks','PagesController@drinks');

Route::resource('posts','PostsController');
Route::resource('food','FoodController');
Route::resource('drinks','DrinksController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
