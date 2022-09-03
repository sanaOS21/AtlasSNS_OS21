<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //TOPページの表示
    public function index()
    {
        //全ての投稿を取得
        $post = Post::get();
        return view('posts.index', ['post' => $post]);
    }
    //投稿機能
    public function create(Request $request)
    {
        $post->user_id = Auth::id();
        $post = $request->input('post');

        \DB::table('posts')->insert(['post' => $post]);
        return redirect('/top');
    }
    //作成した投稿を保存
    public function store(Request $request)
    {
        // dd($request);
        // インスタンスを作成
        $post = new Post;

        //postを代入
        $post->post = $request->post;
        $post->user_id = Auth::id();
        $post->save();
        return redirect('posts.index', ['post' => $post]);
    }
}
