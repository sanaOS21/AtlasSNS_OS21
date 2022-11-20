@extends('layouts.login')

@section('content')

<div class="users-profile-contents">

  <div>
    <img class="logo" src="{{ asset('storage/images/' . $user_id->images) }}">
  </div>

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
  <div class="users-profile-btn">
    <a class="unfollow-button" href="/search/{{$user_id->id}}/unfollow">フォロー解除
    </a>
  </div>
  @else
  <div class="users-profile-btn">
    <a class="follow-button-red" href="/search/{{$user_id->id}}/follow">フォローする
    </a>
  </div>
  @endif

</div>

<ul>
  @foreach ($userPost as $userPost)
  @if($userPost->id)
  <li class="followlist-posts">
    <img class="logo" src="{{ asset('storage/images/' . $userPost->user->images) }}" alt="">
    <div>
      <p>{{$userPost->username}}</p>
      <p>{{$userPost->post}}</p>
    </div>
    <p class="follow-update">{{$userPost->updated_at}}</p>

  </li>
  @endif
  @endforeach

</ul>

@endsection
