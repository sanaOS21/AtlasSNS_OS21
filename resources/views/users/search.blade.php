@extends('layouts.login')

@section('content')


<form action="/search" method="GET">
  <div class="form-group">
    <input type="text" class="search-area" name="search" placeholder="ユーザ名で検索" value="">
    <button type="submit" class="search-submit"><img src="{{asset('images/post.png')}}" alt=""></button>
    <!-- 検索ワード表示 -->
    <p>{{ session('search')}}</p>
  </div>
</form>

<!-- 保存されているレコードを表示 -->
<div class="search-users-table">
  @foreach($users as $user)
  <ul class="search-table">
    @if (Auth::user()->id != $user->id)
    <li class="search-lists">
      <img class="logo" src="{{ asset( 'storage/images/' . $user->images) }}">
      {{$user->username}}
    </li>
    @if(Auth::user()->isFollowing($user->id))
    <li class="follow-button-list">
      <div class="unfollow-button">
        <a href="/search/{{$user->id}}/unfollow" method="get">フォロー解除</a>
      </div>
      @else
      <a class="follow-button-red" href="/search/{{$user->id}}/follow" method="get">フォローする</a>

    </li>
    @endif

    @endif
  </ul>


  @endforeach
</div>
@endsection
