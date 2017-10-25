<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    public static function createOrUpdate ($data, $keys) {
    	$record = self::where($keys)->first();
    	if($record == null) {
    		if($data['social_url'] != null) {
    			return self::insert($data);
    		}
    	}
    	else {
    		return self::where($keys)->update($data);
    	}
    }
}
