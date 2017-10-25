<?php 

use App\Profile;
use App\Comment;
use App\SocialLink;

function checkUser () {
	if(session()->get('user_session')) {
		return true;
	}
	else {
		return false;
	}
}

function getSocialLinksRaw ($user_id) {
	$links = SocialLink::where('profile_id', '=', $user_id)->get();

	return $links;

}

function checkSocialLink ($links, $linkName) {
	foreach($links as $link) {
		if($link->icon_name == $linkName) {
			return $link->social_url;
		}
		else {
			continue;
		}
	}
}

function getSocialLinks ($user_id) {

	$links = SocialLink::where('profile_id', '=', $user_id)->get();
	$markup = "";

	foreach($links as $link) {

		$markup .= "<div class='icon-shell ".$link->icon_name."'>
		<a href='".httpLinkBuilder($link->social_url)."'><i class='fa fa-".$link->icon_name."'></i></a>
		</div>";

	}

	return $markup;

}

function _GU () {
	return session()->get('user_session');
}

function getComments ($user_id) {
	$comments = Comment::where('author_id', '=' ,$user_id)->get();

	return $comments;

}

function getTopUsersByComments () {
	$comments = Comment::orderBy('author_id', 'desc')->get();
	$profiles = Profile::orderBy('id','desc')->get();

	$same = [];

	for($j = 0 ; $j < count($profiles) ; $j++) {

		$pf = $profiles[$j];

		for($i = 0; $i < count($comments) ; $i++) {

			$cm = $comments[$i];

			if($pf->id == $cm->author_id) {

				if(isset($same[$pf->id])) {
					$same[$pf->id]["count"] += 1;
				}
				else {
					$same[$pf->id] = [
						'name' => $pf->name,
						'id' => $pf->id,
						'avatar' => $pf->avatar,
						"count" => 1
					];
				}

			}

		}

	}

	function array_sortXXX($array, $on, $order=SORT_ASC)
	{
	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	            if (is_array($v)) {
	                foreach ($v as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case SORT_ASC:
	                asort($sortable_array);
	            break;
	            case SORT_DESC:
	                arsort($sortable_array);
	            break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;
	}

	$same = array_sortXXX($same, 'count', SORT_DESC);

	$returnedArray = [];

	$index = 0;
	foreach($same as $key=>$item) {

		if($index <= 5) {
			$item = $same[$key];

			array_push($returnedArray,  $item);
		} 
		else {
			break;
		}
		$index++;


	}

	return $returnedArray;





}