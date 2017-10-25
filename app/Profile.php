<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public static function createHashPassword ($pass) {
    	return Hash::make($pass);
    }

    public static function checkEmail ($email = '') {

    	$same_profile = self::where('email', '=', $email)->first();

    	if(isset($same_profile->name) OR isset($same_profile->password)) {

    		return true;

    	}
    	else {

    		return false;

    	}

    }

    public static function register($data) {

    	$data['avatar'] = '/images/default.png';
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['born_date'] = 'null';

    	$id = self::insertGetId($data);

    	$profile = self::where('id', '=', $id)->first();

    	session()->put('user_session', $profile);

    	return $profile;

    }

    public static function login ($data) {

        $profile = Profile::where('email', '=', $data['email'])->first();

        if(isset($profile->email)) {

            if(Hash::check($data["password"], $profile->password)) {
                session()->put('user_session', $profile);
                return true;
            }
            else {
                return false;
            }

        }
        else {
            return false;
        }

    }
}
