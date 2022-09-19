<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
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
