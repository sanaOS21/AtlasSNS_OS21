<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
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
    public function update(Request $request, User $user)
    {

        $auth = Auth::user();
        $auth->id = $request->input('id');
        $auth->username = $request->input('username');
        $auth->mail = $request->input('mail');
        //bcrypt ググる　画像のはめ方もググる
        $auth->password = bcrypt($request->input('password'));
        $auth->bio = $request->input('bio');

        //多分効いていない
        $validate = [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40',
            'password' => 'required|string|min:8|max:20|confirmed',
            'bio' => 'max:150',
            'images' => 'file|mimes:png,jpg,bmp,gif,svg',
        ];
        $this->validate($request, $validate);

        //更新できてないから↓で保存されていない...
        $auth->save();
        return redirect('profile');
    }
    //

    // \DB::table('users')
    //     ->where('id', $id)
    //     ->update(
    //         ['username' => $username],
    //         ['mail' => $mail],
    //         ['password' => bcrypt($password)],
    //         ['bio' => $bio],
    //     );
    // return redirect('profile');
    // }

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
