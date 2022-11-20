@extends('layouts.login')

@section('content')

<div class="users-profile-contents">
  <img class="logo" src="{{ asset('storage/images/' . $user_id->images) }}">

  <ul class="users-profile-posts">
    <li>
      <p class="users-profile-title">name:</p>
      <p class="users-profile-box">{{$user_id->username}}</p>
    </li>
    <li>
      <p class="users-profile-title">bio:</p>
      <p class="users-profile-box">{{$user_id->bio}}</p>
    </li>
  </ul>

  @if(Auth::user()->isFollowing($user_id->id))
  <div class="usersprofile-btn">
    <a class="unfollow-btn" href="/search/{{$user_id->id}}/unfollow">フォロー解除
    </a>
  </div>
  @else
  <div class="usersprofile-btn">
    <a href="/search/{{$user_id->id}}/follow">フォローする
    </a>
  </div>
  @endif

  <ul>
    @foreach ($userPost as $userPost)
    <li class="followlist-posts">
      <img class="logo" src="{{ asset('storage/images/' . $userPost->user->images) }}" alt="">
      <div>
        <p>{{$userPost->username}}</p>
        <p>{{$userPost->updated_at}}</p>
      </div>
      <p class="follow-update">{{$userPost->post}}</p>

    </li>
    @endforeach

  </ul>
</div>
@endsection
