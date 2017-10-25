<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use App\PostCategory;
use App\Post;
use App\Upload;
use App\PageCategory;
use App\Page;
use App\Comment;
use App\TopicCategory;

class AdminController extends Controller
{

    public function remove_comments (Request $req) {
        $arrayForDelete = [];

        foreach($req->comment_ids as $key=>$item) {

            array_push($arrayForDelete, intval($item));

        }

        Comment::whereIn('id', $arrayForDelete)->delete();

        return redirect($req->red_url);

    }

	public function get_posts () {
		return view('admin.modules.posts', ['categories' => PostCategory::orderBy('id', 'desc')->get()]);
	}

    public function commentaries () {
        return view('admin.modules.commentaries');
    }

	public function index () {
		return view('admin.index');
	}

    public function login (Request $req) {
    	if(Admin::checkSession()) {
    		return redirect('/admin');
    	}
    	else {
    		return view('admin.login');
    	}
    }

    public function auth (Request $req) {
    	$a_login = $req->a_login;
    	$a_passw = $req->a_password;


    	$isAuth = Admin::AuthAdmin($a_login, $a_passw);

    	if($isAuth == true) {
    		return redirect('/admin');
    	}
    	else {
    		return view('admin.login', ['error_message' => 'Помилка. Логін або пароль введені неправильно!']);
    	}

    }

    public function get_categories () {
    	return view('admin.modules.categories', ['categories' => PostCategory::orderBy('id', 'desc')->get()]);
    }

    public function get_uploads () {
    	return view('admin.modules.uploads', ['uploads' => Upload::orderBy('id', 'desc')->get()]);
    }

    public function add_uploads (Request $req) {
    	$uploads = $req->uploads;
    	$data = [];

    	$chars = '123456789qwertyuioasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLXCVBNM';

    	foreach($uploads as $upload) {

    		$name = 'AU_'.substr(str_shuffle(str_repeat($x=$chars, ceil(20/strlen($x)) )),1,20);

    		$path = public_path().'/uploads/inside-content/';
    		$ext = $upload->getClientOriginalExtension();
    		$full_name = $name.'.'.$ext;

    		$upload->move($path,$full_name);

    		$uploader = session()->get('admin_session');

    		$uploader_name = $uploader->first_name.' '.$uploader->last_name;

    		array_push($data, ['upload_path' => '/uploads/inside-content/'.$full_name, 'upload_extension' => $ext, 'upload_author_name' => $uploader_name, 'upload_author_id' => $uploader->id]);

    	}

    	Upload::insert($data);

    	return redirect('/admin/uploads?success=1');



    }

    public function add_category (Request $req) {

    	$c_title  = $req->category_title;
    	$c_desc   = $req->category_description;
    	$c_alt    = $req->category_alt_link;
    	$c_status = $req->category_status;

    	PostCategory::insertGetId([
    		'name' => $c_title,
    		'description' => $c_desc,
    		'alt_link' => $c_alt,
    		'status' => $c_status
    	]);

    	return redirect('/admin/categories?success=1');
    }

    public function info () {

        $categories = PageCategory::where('status', '=', 1)->get();

        return view('admin.modules.info', ['categories' => $categories]);

    }

    public function add_info (Request $req) {

        $data = [
            'title' => $req->info_title,
            'content' => $req->info_content,
            'main_image' => $req->info_main_image,
            'status' => $req->info_status,
            'created_at' => date("Y-m-d H:i:s"),
            'views' => 0,
            'alt_link' => $req->info_alt_link,
            'category_id' => $req->info_category
        ];

        $chars = '123456789qwertyuioasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLXCVBNM';

        $a = session()->get('admin_session');

        $full_path = base_path().'/public/uploads/pages/';
        $short_path = '/uploads/pages/';

        $upload_name = 'UP_'.substr(str_shuffle(str_repeat($x=$chars, ceil(20/strlen($x)) )),1,20).".".$req->info_main_image->getClientOriginalExtension();

        $req->info_main_image->move($full_path, $upload_name);

        $data['main_image'] = $short_path.$upload_name;

        Page::insert($data);

        return redirect('/admin/info?success=1');


    }

    public function category_info () {

        return view('admin.modules.category-info');

    }

    public function add_info_category (Request $req) {
        $data = [
            'title' => $req->c_title,
            'alt_link' => $req->c_alt,
            'status' => $req->c_status,
            'created_at' => date('Y-m-d H:i:s')
        ];

        PageCategory::insertGetId($data);

        return redirect('/admin/info/category?success=1');

    }

    public function add_post (Request $req) {

    	$p_title    = $req->post_title;
    	$p_content  = $req->post_content;
    	$p_status   = $req->post_status;
    	$p_category = $req->post_category;
    	$p_alt_link = $req->post_alt_link;
    	$p_views    = 0;
    	$p_image    = $req->post_main_image;

    	$check = Post::where('alt_link', '=', $p_alt_link)->first();

    	if(isset($check->title)) {
    		return redirect('/admin/posts?error=1');
    	}
    	else {

    		$chars = '123456789qwertyuioasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLXCVBNM';

    		$a = session()->get('admin_session');

    		$full_path = base_path().'/public/uploads/posts/';
    		$short_path = '/uploads/posts/';

    		$name = 'ZP_'.substr(str_shuffle(str_repeat($x=$chars, ceil(20/strlen($x)) )),1,20); 
    		$ext = $p_image->getClientOriginalExtension();

    		$full_name = $name.'.'.$ext;

    		$p_image->move($full_path, $full_name);

    		Post::insertGetId([
    			'title' => $p_title,
    			'content' => $p_content,
    			'status' => $p_status,
    			'category_id' => $p_category,
    			'author_name' => $a->first_name.' '.$a->last_name,
    			'author_email' => $a->email,
    			'author_id' => $a->id,
    			'views' => 0,
    			'created_at' => date('Y-m-d H:i:s'),
    			'main_image' => $short_path.$full_name,
    			'alt_link' => $p_alt_link
    		]);

    		return redirect('/admin/posts?success=1');

    	}

    }

    public function forum_category () {
        $categories = TopicCategory::orderBy("id", 'desc')->get();

        return view('admin.modules.forum-category', ['categories' => $categories]);
    }

    public function forum_category_post (Request $req) {
        $cat_title = $req->cat_title;
        $alt = $req->cat_alt_link;

        $topic = TopicCategory::where('alt_url', '=', $alt)->first();

        if(isset($topic->title)) {
            return redirect($req->red_url);
        }
        else {
            TopicCategory::insert([
                'title' => $cat_title,
                'alt_url' => $alt
            ]);

            return redirect($req->red_url);
        }
    }

}
