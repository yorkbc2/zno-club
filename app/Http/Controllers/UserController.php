<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\SocialLink;

class UserController extends Controller
{
    public function form () {

    	return view('front.profile.login');

    }

    public function profile ($profileID) {

        $profile = Profile::where('id', '=', $profileID)->first();

        if(isset($profile->name)) {
            if(isset(_GU()->id)) {
                if($profile->id == _GU()->id) {
                    return rdph('/profile');
            }   
            }
            return view('front.profile.single', ['profile' => $profile]);
        }

    }

    public function social_links (Request $req) {

        $links = $req->links;

        $insertData = [];
        $user = session()->get('user_session');


        foreach($links as $key=>$item) {
            $social_link = SocialLink::createOrUpdate(
                    [
                        "profile_id" => intval($user->id),
                        "icon_name" => $key,
                        "social_url" => $item
                    ],
                    [
                        ["profile_id", "=", $user->id], 
                        ["icon_name", '=', $key]
                    ]);
        }


        return rdph('/profile');

    }

    public function my_profile () {

    	$profile = Profile::where('id', '=', session()->get('user_session')->id)->first();

        if(isset($_GET['action'])) {
            $action = $_GET['action'];

            switch($action) {
                case "add_social":
                    return view('front.profile.actions.add_social', ['profile' => $profile]);
                case "change_avatar":
                    return view('front.profile.actions.change_avatar', ['profile' => $profile]);
                default: 
                    return view('front.profile.index', ['profile' => $profile]);

            }

        }

        return view('front.profile.index', ['profile' => $profile]);

    }

    public function register (Request $req) {

    	$data = [
    		'email' => $req->u_email,
    		'name' => $req->u_name,
    		'password' => Profile::createHashPassword($req->u_password)
    	];

    	if(Profile::checkEmail($data['email'])) {
    		return view('front.profile.login', ['error_message' => 'Така поштова скринька вже зареєстрована! Спробуйте знову та введіть іншу поштову скриньку!']);
    	}
    	else {

    		if($req->u_password == $req->u_r_password) {

    			$profile = Profile::register($data);

    			return rdph('/profile');

    		}
    		else {

    			return view('front.profile.login', ['error_message' => 'Паролі не збігаються. Потрібно, що б паролі, які введені в двох полях, були однаковими!']);

    		}

    	}

    }

    public function login (Request $req) {

        $data = [
            'email' => $req->u_email,
            'password' => $req->u_password
        ];

        $isAuth = Profile::login($data);

        if($isAuth == true) {
            return rdph('/profile');
        }
        else {
            return view('front.login', ['error_login_message' => "Поштова скринька чи пароль введені неправильно!"]);
        }

    }


    public function logout () {

        session()->forget('user_session');
        return rdph('/');

    }

}
