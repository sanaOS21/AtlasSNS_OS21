@extends('layouts.login')

@section('content')


<form action="/search" method="GET">
  <div class="form-group">
    <input type="text" class="search-input" name="search" placeholder="ユーザ名で検索" value="">
    <button type="submit" class="search-submit"><img src="{{asset('images/post.png')}}" alt=""></button>
    <!-- 検索ワード表示 -->
    <p>{{ session('search')}}</p>
</form>
</div>

<!-- 保存されているレコードを一覧表示 -->
<div class="search-box">
  @foreach($users as $user)
  <tr class="search-table">
    <td>{{$user->username}}</td>
  </tr>
  @if(Auth::user()->isFollowing($user->id))
  <form class="follow-btn" action="/search/{{$user->id}}/unfollow" method="get"><br><button type="submit">フォロー解除</button>
  </form>
  @else
  <form class="follow-btn" action="/search/{{$user->id}}/follow" method="get">
    <button type="submit">フォローする</button>
  </form>
  @endif




  @endforeach
</div>

@endsection
