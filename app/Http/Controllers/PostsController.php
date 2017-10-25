<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostsController extends Controller
{
    public function get_posts () {
    	
    	$posts = Post::where('status', '=', 1)->orderBy('id', 'desc')->paginate(6);

    	return view('front.posts', ['posts' => $posts]);

    }

    public function remove_comment (Request $req) {

        Comment::where([
            "id" => $req->commentary_id,
            'author_id' => $req->author_id
        ])->delete();

        return rdph($req->redirect_url);

    }

    public function get_single_post ($postUrl) {

    	$post = Post::where([
    		'status' => 1,
    		'alt_link' => $postUrl
    	])->first();


    	if(isset($post->title)) {
            Post::where('alt_link', '=', $postUrl)->increment('views');
            $comments = Comment::where('post_id', '=', $post->id)->get();
    		return view('front.post', ['post' => $post, 'comments' => $comments]);
    	}
    	else {
    		return view('front.errors.post-not-found');
    	}

    }

    public function add_comment (Request $req) {
        $user_data = session()->get('user_session');

        $postid = $req->id; 
        $content = $req->content;

        $data = [
            'post_id' => $postid,
            'content' => $content, 
            'author_id' => $user_data->id,
            'author_name' => $user_data->name,
            'author_email' => $user_data->email,
            'author_avatar' => $user_data->avatar,
            'created_at' => date("Y-m-d H:i")
        ];

        $ableData = json_encode($data, true);

        Comment::insertGetId($data);

        return $ableData;

    }
} 
