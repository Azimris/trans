<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Session;

class UserController extends Controller
{

    
    public function index(Request $request)
    {
       return view('index');
    }

    public function search(Request $request){

      if($request->name){

        $user = User::where('name','like','%'.$request->name.'%')
                  ->where('id','!=',Auth::user()->id)
                  ->whereNotIn('id',Auth::user()->follower->pluck('id'))
                  ->whereNotIn('id',Auth::user()->following->pluck('id'))->get();

        if(count($user)){

            $message = NULL;

        }else{

           $message = 'No Record found. please try something else ! or check your friend request bucket';

        }

      }else{

        $user = NULL;

        $message = NULL;
      }

      $data = view('search',compact('user','message'))->render();

      return ['status' => true, 'data' => $data];

    }

    // Add to friend

    public function addfriend($id)
    {
    	$user = User::find(Auth::user()->id);
    	$user->following()->attach($id,['status'=>1]);
    	return \Redirect('home');
    }

    // Friend Listing

    public function friendlist(User $user)
    {
    	 return view('friends',compact('user'));
    }

    // Friend Request List

    public function friendRequestList()
    {

    	$user = User::find(Auth::user()->id);

    	$pendingRequest = $user->whereHas('following',function($q) {
    			$q->where('following_id',Auth::user()->id);
    			$q->where('status',1);
    		})->get();

    	return view('pendingrequest',compact('pendingRequest'));
    }

    // Accepting friend request

    public function acceptfriendRequestList($id)
    {

    	$user = User::find(Auth::user()->id);
    	$user->follower()->updateExistingPivot($id,['status'=>2]);

    	return \Redirect('request');

    }

    // Friends Profile

    public function otherprofile(Request $request,User $user)
    {
		    return view('othersProfile',compact('user'));
    }
}
