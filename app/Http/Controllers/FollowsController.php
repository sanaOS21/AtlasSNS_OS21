<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use App\Post;

class FollowsController extends Controller
{
    //フォローリストを画面表示
    public function followList()
    {
        //usersテーブルから情報をとる
        // $users = \DB::table('users')->get();

        $followAll = Auth::user()->follows()->get();
        // フォローしているユーザのidを取得  pluck...()内だけ取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        // フォローしているユーザのidを元に投稿内容を取得
        //whereIn...配列内に含まれる条件を追加??
        $followPost = Post::with('user')->whereIn('user_id', $following_id)->get();
        return view('follows.followList', compact('followAll', 'followPost'));
    }

    // フォロワーリストを画面表示
    public function followerList()
    {
        $followerAll = Auth::user()->followers()->get();
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $followerPost = Post::with('user')->whereIn('user_id', $followed_id)->get();
        return view('follows.followerList', compact('followerAll', 'followerPost'));
    }

    // フォロー
    public function follow($id)
    {
        $follower = Auth::user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if (!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow($id)
    {
        $follower = Auth::user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if ($is_following) {
            // フォローしていればフォロー解除
            $follower->unfollow($id);
            return back();
        }
    }

    // public function show($id)
    // {
    //     $follow_count = $follower->getFollowCount($id);
    //     $follower_count = $follower->getFollowerCount($id);

    //     return view('/login', [
    //         'follow_count'   => $follow_count,
    //         'follower_count' => $follower_count
    //     ]);
    // }
}
