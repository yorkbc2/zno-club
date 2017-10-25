<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static function checkSession() {
    	if(session()->get('admin_session')) {
    		if(session()->get('admin_session')->id) {
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

    public static function createHashFromString($string='') {
        return Hash::make($string);
    }

    public static function AuthAdmin ($log='', $pass='') {
        $admin = self::where('login', '=', $log)->first();

        if(isset($admin->id)) {
            if(Hash::check($pass, $admin->password)) {

                session()->put('admin_session', $admin);

                return true;
            }
            else {
                return false;
            }
        }
        else {
            return $admin;
        }
    }
}
