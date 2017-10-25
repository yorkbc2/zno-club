<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;

class ViewController extends Controller
{
    public function index() {

    	$posts = Post::orderBy('id','desc')->where('status', '=', 1)->limit(2)->get();

    	return view('front.index', ['posts' => $posts]);

    }

    public function in_developing () {
    	return view('front.errors.developing');
    }

}
