<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostsController extends Controller
{
    //TOPページの表示
    public function index()
    {
        $followList = Auth::user()->follows()->pluck('followed_id');
        $followPost = Post::with('user')->whereIn('user_id', $followList)->orWhere('user_id', \Auth::user()->id)->latest()->get();

        return view('posts.index', compact('followPost'));
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
    //カリキュラム参考
    public function update(Request $request)
    {
        $id = $request->input('id');

        $up_post = $request->input('up_post');
        $rules = ['up_post' => 'required|string|max:150',];
        $this->validate($request, $rules);

        \DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $up_post]);

        return redirect('/top');
    }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

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

    public function images(Request $request, User $user)
    {
        if ($originalImg->isValid()) {
            $filePath = $originalImg->store('public');
            $user->image = str_replace('public/', '', $filePath);
            $user->save();
            return redirect("/top")->with('user', $user);
        }
    }
}
