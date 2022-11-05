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

// use Illuminate\Routing\Route;

Auth::routes();

//①ログアウト中のページ
Route::group(['middleware' => 'guest'], function () {
  //ログイン画面
  Route::get('/login', 'Auth\LoginController@login')->name('login');
  Route::post('/login', 'Auth\LoginController@login');

  //新規登録画面
  Route::get('/register', 'Auth\RegisterController@register');
  Route::post('/register', 'Auth\RegisterController@register');
  //下記追加
  Route::get('/added', 'Auth\RegisterController@added')->name('auth.added');
  Route::post('/added', 'Auth\RegisterController@added');
});
//②ログイン中のページ

//topページの表示

Route::group(['middleware' => "auth"], function () {
  // ログアウト
  Route::get('/logout', 'Auth\LoginController@logout');

  Route::get('/top', 'PostsController@index');
  //投稿機能
  Route::post('/post-create', 'PostsController@create');
  //投稿更新
  Route::post('posts/update', 'PostsController@update');
  //削除機能(削除はget)
  Route::get('/top/{id}/delete', 'PostsController@delete');
  //投稿削除機能
  Route::post('post/update', 'PostsController@update');

  Route::get('/profile', 'UsersController@profile');
  //プロフィール編集機能
  Route::post('/profile', 'UsersController@update');

  // ユーザー検索
  Route::get('/search', 'UsersController@search');

  // フォローリスト（個→多）
  Route::get('/follow-list', 'FollowsController@followList');
  // フォロワーリスト（多→個）
  Route::get('/follower-list', 'FollowsController@followerList');

  Route::post('/follow_create', 'UsersController@follow_create');
  Route::get('/top/{id}/delete', 'UsersController@delete');
  //投稿削除機能
  Route::post('post/update', 'UsersController@update');
  // フォロー
  Route::get('/search/{id}/follow', 'FollowsController@follow');
  // フォロー解除
  Route::get('/search/{id}/unfollow', 'FollowsController@unfollow');
  // 他ユーザのプロフィール表示
  Route::get('/{id}/profile', 'UsersController@usersprofile');
});
//
