<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;


class UsersController extends Controller
{
    //
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
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $username],
                ['mail' => $mail],
                ['password' => bcrypt($password)],
                ['bio' => $bio],
            );
        return redirect('profile');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = User::query();

        if (!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");
        }
        $users = $query->get();
        // 検索ワード表示
        $request->session()->put('search', $search);

        return view('users.search', compact('users', 'search'));
    }
}
