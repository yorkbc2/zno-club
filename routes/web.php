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
Route::prefix(config('yorke.prefix'))->group(function () {

	Route::get('/', 'ViewController@index');
	Route::get('/posts', 'PostsController@get_posts');
	Route::get('/post/{postUrl}', 'PostsController@get_single_post');
	Route::get('/forum', 'ForumController@index');
	Route::get('/forum/add-topic', 'ForumController@topic_add_get')->middleware('profile');
	Route::get('/info', 'PageController@info');
	Route::get('/info/{categoryUrl}', 'PageController@info_get');
	Route::get('/info/{categoryUrl}/{pageUrl}', 'PageController@index');
	Route::get('/signup', 'UserController@form')->middleware('non_profile');
	Route::get('/profile', 'UserController@my_profile')->middleware('profile');
	Route::get('/profile/{profileID}', 'UserController@profile');
	Route::get('/logout', 'UserController@logout')->middleware('profile');
	Route::get('/forum/category/{categoryUrl}', 'ForumController@category');
	Route::get('/forum/topic/{topicId}', 'ForumController@topic');


	// Post routes 

	Route::post('/register', 'UserController@register')->middleware('non_profile');
	Route::post('/login', 'UserController@login')->middleware('non_profile');
	Route::post('/add-comment', 'PostsController@add_comment')->middleware('profile');
	Route::post('/profile/add-social', 'UserController@add_social')->middleware('profile');
	Route::post('/post/remove-comment', 'PostsController@remove_comment')->middleware('profile');
	Route::post('/profile/add-social', 'UserController@social_links')->middleware('profile');
	Route::post('/forum/add-topic', 'ForumController@topic_add_post')->middleware('profile');
	Route::post('/forum/get-commentaries', 'ForumController@api_comments');

	// ------



	Route::get('/admin', 'AdminController@index')->middleware('admin');
	Route::get('/admin/login', 'AdminController@login');

	Route::get('/admin/posts', 'AdminController@get_posts')->middleware('admin');
	Route::get('/admin/uploads', 'AdminController@get_uploads')->middleware('admin');
	Route::get('/admin/info', 'AdminController@get_info')->middleware('admin');
	Route::get('/admin/categories', 'AdminController@get_categories')->middleware('admin');
	Route::get('/admin/forum', 'AdminController@get_forum')->middleware('admin');
	Route::get('/admin/logout', 'AdminController@logout')->middleware('admin');
	Route::get('/admin/info', 'AdminController@info')->middleware('admin');
	Route::get('/admin/info/category', 'AdminController@category_info')->middleware('admin');
	Route::get('/admin/profile/commentaries', 'AdminController@commentaries')->middleware('admin');
	Route::get('/admin/forum/category', 'AdminController@forum_category')->middleware('admin');



	Route::post('/admin/api/v1/add-category', 'AdminController@add_category')->middleware('admin');
	Route::post('/admin/api/v1/add-post', 'AdminController@add_post')->middleware('admin');
	Route::post('/admin/api/v1/add-page-category', 'AdminController@add_info_category')->middleware('admin');
	Route::post('/admin/api/v1/add-page', 'AdminController@add_info')->middleware('admin');
	Route::post('/admin/api/v1/add-uploads', 'AdminController@add_uploads')->middleware('admin');
	Route::post('/admin/login', 'AdminController@auth')->middleware('admin');
	Route::post("/admin/remove-comments", "AdminController@remove_comments")->middleware('admin');
	Route::post('/admin/forum/add-category', "AdminController@forum_category_post")->middleware('admin');
});
