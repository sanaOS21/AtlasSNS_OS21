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
        //「latest()」（降順）だとorderByより短いらしい(⇔oleest()_昇順)0905
        $posts = Post::latest()->get();
        // $post = Post::get();
        //compact...controllerから変数の受渡（可読性が高い）
        return view('posts.index', compact('posts'));
    }
    //投稿機能
    public function create(Request $request)
    {
        Post::create([
            //コントローラーではログインユーザ(Auth::user())のidプロパティを参照したい
            'user_id' => Auth::id(),
            'post' => $request->input('post'),
        ]);
        return redirect('/top');
    }
    // public function update(){
    //更新内容記載？
    // }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

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
