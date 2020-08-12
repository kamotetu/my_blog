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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index')->name('front.index');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('article/create', 'ArticleController@create')->name('admin.article.create');
    Route::post('article/store', 'ArticleController@store')->name('admin.article.store');
});
// Route::get('article/create', 'ArticleController@create')->middleware('auth')->name('article.create');

Route::get('/home', 'HomeController@index')->name('home');


