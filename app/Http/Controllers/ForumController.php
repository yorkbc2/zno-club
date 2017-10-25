<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\TopicCategory;
use App\TopicComment;
use App\TopicBall;


class ForumController extends Controller
{
    public function index () {
    	$topics = Topic::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);

    	return view('front.forum.index', ['topics' => $topics]);
    }

    public function topic_add_get () {
    	$categories = TopicCategory::get();
    	return view('front.forum.add-topic' , ['categories' => $categories]);
    }

    public function topic_add_post (Request $req) {
    	$title = $req->t_title;
    	$content = $req->t_content;
    	$category = $req->t_category;

    	$author = _GU();

    	$data = [
    		'title' => $title,
    		'content' => $content,
    		'category_id' => intval($category),
    		'views' => 0,
    		'comments_able' => 1,
    		'status' => 1,
    		'author_id' => $author->id,
    		'author_name' => $author->name,
    		'author_avatar' => $author->avatar,
    		'created_at' => date('Y-m-d H:i')
    	];

    	$tid = Topic::insertGetId($data);

    	return rdph('/forum/topic/'.$tid);

    }

    public function topic ($topicId) {
        $topic = Topic::where('id', '=', $topicId)->first();

        if(isset($topic->title)) {
            $comments = TopicComment::where('topic_id', '=', $topic->id)->orderBy('id','desc')->get();
            $balls = TopicBall::where('to_id', '=', $topic->id)->get();
            $ballsCount = 0;
            if(count($balls) > 0) {
                $positive = 0;
                $negative = 0;
                foreach($balls as $key=>$item) {
                    if($item->status == 1) {
                        $positive++;
                    }
                    else {
                        $negative++;
                    }
                }

                $ballsCount = $positive - $negative;
            }
            else {
                $ballsCount = 0;
            }

            return view('front.forum.topic', ['topic' => $topic, 'comments' => $comments, 'balls' => $ballsCount]);
        }
        else {
            return view('front.errors.topic', ['error_message' => "Топік не знайдено! Поверність назад на форму для пошуку інших топіків."]);
        }
    	
    }

    public function api_comments (Request $req) {

        $comments = TopicComment::where('topic_id', '=', $req->id)->orderBy('id', 'desc')->get();

        return response()->json($comments);
    }

    public function category ($categoryUrl) {
    	$category = TopicCategory::where('alt_url', '=', $categoryUrl)->orWhere('id', '=', $categoryUrl)->first();

    	$topics=[];

    	if($categoryUrl == "all") {
    		$topics = Topic::where('status', '=', 1)->paginate(10);
    	}
    	else {
	    	$topics = Topic::where([
	    		['category_id', '=', $category->id],
	    		['status', '=', 1]
	    	])->paginate(10);
    	}

    	return view('front.forum.category', ['current_cat' => $categoryUrl, 'topics' => $topics]);
    }
}
