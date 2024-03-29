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
    return view('welcome');
});
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
//投稿画面
Route::get('/top','PostsController@index');
//投稿処理
Route::post('posts','PostsController@store');
//更新画面
Route::post('/top','PostsController@update');
//更新処理
Route::get('/post/{id}/update-form','PostsController@updateForm');
//削除処理
Route::get('/post/{id}/delete','PostsController@delete');

Route::get('/profile','UsersController@profile');

//ユーザー一覧の表示
Route::get('/search','UsersController@search');
//ユーザ検索
Route::post('/search','UsersController@index');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

//フォローボタン
Route::post('/users/{user}/follow','FollowsController@follow')->name('follow');
Route::delete('/users/{user}/unfollow','FollowsController@unfollow')->name('unfollow');


Route::get('/logout','Auth\LoginController@logout');

});