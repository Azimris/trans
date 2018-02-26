<?php
namespace App;
use App\User;
use Auth;


class Utility {

 	public static function requestCount()
 	{
 		if(Auth::user())
 		{
	 		$user = User::find(Auth::user()->id);

	    	$RequestCount = $user->whereHas('following',function($q) {
	    			$q->where('following_id',Auth::user()->id);
	    			$q->where('status',1);
	    		})->count();
	    }else{
	    	$RequestCount = NULL;
	    }
    	return $RequestCount;

 	}
 }
