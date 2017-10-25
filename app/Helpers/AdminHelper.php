<?php 

use App\Comment;

function getAllCommentaries() {
	return Comment::orderBy("id", "desc")->get();
}