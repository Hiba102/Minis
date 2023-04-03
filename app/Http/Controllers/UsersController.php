<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    //

    public function follow(User $user) {
        Auth::user()->follow($user);   
    return redirect()->back()->with('success','Your are now following '. $user->username);

    }

    public function unfollow(User $user) {
          //if exists
   Auth::user()->unfollow($user);
   return redirect()->back()->with('success','Your unfollowed '. $user->username);
        
    }

    public function show_user(User $user) {
        return view('users.user-profile',['user'=>$user,'minis'=>$user->minis()->orderBy('updated_at','desc')->get()]);
        
    }

    public function list_followers(User $user) {
        return view('users.follow-list',['users_list'=>$user->followed_by()->get()]);
        
    }

    public function list_followed(User $user) {
        return view('users.follow-list',['users_list'=>$user->following()->get()]);
        
    }
}
