@extends('layouts.login')

@section('content')

<ul class="form-group">

  <li class="followlist-contents">
    @foreach($followerAll as $followerAll)
    <a class="follow-contents-images" href="/{{$followerAll->id}}/profile">
      <img class="logo" src="{{ asset('storage/images/' . $followerAll->images) }}" alt="">
    </a>
    @endforeach
  </li>
</ul>

<!-- <div class="search-area"> -->

<ul>
  @foreach ($followerPost as $followerPost)
  <li class="followlist-posts">
    <a href="/{{$followerAll->id}}/profile">
      <div class="follow-post-images">
        <img class="logo" src="{{ asset('storage/images/' . $followerPost->user->images) }}" alt="">
      </div>
    </a>
    <div class="follow-user">
      <p>{{$followerPost->user->username}}</p>
      <p>{{$followerPost->post}}</p>
    </div>
    <p class="follow-update">{{$followerPost->updated_at}}</p>
  </li>
  @endforeach

</ul>
<!-- </div> -->

@endsection
