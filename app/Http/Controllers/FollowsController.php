<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;

class FollowsController extends Controller
{

    //なんかわからない....
    public function followList(Request $request)
    {
        $user_id = Auth::user()->id;
        $follower_id = $request->input('id');
        \DB::table('follow')->insert([
            'follower_id' => $user_id,
            'followed_id' => $follower_id
        ]);
        // $followList = Auth::user()->follows()->get();
        return view('follows.followList', compact('followList'));
    }
    public function followerList()
    {
        return view('follows.followerList');
    }
}
