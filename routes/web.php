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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes(); はオプションとして引数を渡すことで使わない機能を制御する【佐藤追記】
Auth::routes();

//①ログアウト中のページ
//ログイン画面
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
//新規登録画面
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
//下記追加
Route::get('/added', 'Auth\RegisterController@added')->name('auth.added');
Route::post('/added', 'Auth\RegisterController@added');

//②ログイン中のページ

//topページの表示
// Route::group(['middleware' => "auth"], function () {
Route::get('/top', 'PostsController@index');
//投稿機能
Route::post('/top', 'PostsController@create');

Route::get('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@index');

Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');
// });
//
