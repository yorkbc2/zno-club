<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PageCategory;
use App\Page;

class PageController extends Controller
{
	public function index ($categoryUrl, $pageUrl) {
		$category = PageCategory::where('alt_link', '=', $categoryUrl)->first();

		if($category->status == 1) {

			$page = Page::where('alt_link','=',$pageUrl)->first();

			return view("front.single", ['category' => $category, 'page' => $page]);

		}
		else {
			return rdph('/info');
		}

	}

    public function info () {
    	$categories = PageCategory::where('status', '=', 1)->get();

    	return view('front.info', ['categories' => $categories]);

    }

    public function info_get ($categoryUrl) {

    	$category = PageCategory::where('alt_link', '=', $categoryUrl)->first();

    	$id = $category->id;

    	$pages = Page::where('category_id', '=', $id)->get();

    	return view('front.info_single', ['pages' => $pages, 'url' => $categoryUrl, 'title' => $category->title]);

    }
}
