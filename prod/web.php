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

Route::get('/pleasegivemeplace', 'ViewController@index');

	Route::get('/pleasegivemeplace/posts', 'PostsController@get_posts');
	Route::get('/pleasegivemeplace/post/{postUrl}', 'PostsController@get_single_post');
	Route::get('/pleasegivemeplace/forum', 'ViewController@in_developing');
	Route::get('/pleasegivemeplace/info', 'ViewController@in_developing');
	Route::get('/pleasegivemeplace/signup', 'ViewController@in_developing');

	Route::get('/pleasegivemeplace/admin', 'AdminController@index')->middleware('admin');
	Route::get('/pleasegivemeplace/admin/login', 'AdminController@login');

	Route::get('/pleasegivemeplace/admin/posts', 'AdminController@get_posts')->middleware('admin');
	Route::get('/pleasegivemeplace/admin/uploads', 'AdminController@get_uploads')->middleware('admin');
	Route::get('/pleasegivemeplace/admin/info', 'AdminController@get_info')->middleware('admin');
	Route::get('/pleasegivemeplace/admin/categories', 'AdminController@get_categories')->middleware('admin');
	Route::get('/pleasegivemeplace/admin/forum', 'AdminController@get_forum')->middleware('admin');
	Route::get('/pleasegivemeplace/admin/logout', 'AdminController@logout')->middleware('admin');


	Route::post('/pleasegivemeplace/admin/api/v1/add-category', 'AdminController@add_category');
	Route::post('/pleasegivemeplace/admin/api/v1/add-post', 'AdminController@add_post');
	Route::post('/pleasegivemeplace/admin/api/v1/add-uploads', 'AdminController@add_uploads');
	Route::post('/pleasegivemeplace/admin/login', 'AdminController@auth');

