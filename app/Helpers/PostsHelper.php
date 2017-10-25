<?php 

use App\Post;

function get_popular_posts($limit = 5) {

	return Post::where('status', '=', 1)->orderBy('views',' desc')->limit($limit)->get();

}