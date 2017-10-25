<?php 

use App\TopicCategory;

function getTopicCategories () {
	return TopicCategory::orderBy('id', 'desc')->get(); 
}

function getCategoryById ($id) {
	return TopicCategory::where('id', '=', $id)->first();
}