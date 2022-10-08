<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;


class UsersController extends Controller
{
    public function profile()
    {
        //認証済みのユーザ取得
        $auth = Auth::user();
        return view('users.profile', ['auth' => $auth]);
    }

    public function bio(array $data)
    {
        //bio(自己紹介文)を作成
        return User::create([
            'bio' => $data['bio'],
        ]);
    }

    // PostsController@updateのまんま↓
    public function update(Request $request)
    {


        // バリデーション
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40',
            'password' => 'required|string|min:8|max:20|confirmed',
            'password_confirmation' => 'required',
            'bio' => 'max:150',
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput();
        }
        $auth = Auth::user();
        $auth->username = $request->input('username');
        $auth->mail = $request->input('mail');
        //bcrypt...値（パス）が一致しているかを確認（よくわからない）
        $auth->password = bcrypt($request->input('password'));
        $auth->bio = $request->input('bio');
        $image = $request->file('images');


        // 画像のアップ方法
        // 画像がセットされれば保存処理を実行
        // ーーー下記コメントアウトーーー
        if (isset($request->images)) {

            //バリデーション
            $request->validate([
                'images' =>
                'file|image|mimes:png,jpg,bmp,gif,svg',
            ]);
            $image_path = $image->store('public/images');
            $auth->images = basename($image_path);
        }
        // ーーーーーー




        $auth->update();
        return redirect('profile');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = User::query();

        if (!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");
            $request->session()->put('search', '検索ワード：' . $search);
        } else {
            \Session::forget('search');
            $users = User::all();
        }
        $users = $query->get();
        // 検索ワード表示


        return view('users.search', compact('users', 'search'));
    }
}
