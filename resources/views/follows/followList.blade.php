@extends('layouts.login')

@section('content')

<ul class="form-group">

  <li class="followlist-contents">
    @foreach($followAll as $followAll)
    <a class="follow-contents-images" href="/{{$followAll->id}}/profile">
      <!-- asset...viewで表示するため -->
      <img class="logo" src="{{ asset('storage/images/' . $followAll->images) }}" alt="">
    </a>
    @endforeach
  </li>
</ul>

<ul>
  @foreach ($followPost as $followPost)
  <li class="followlist-posts">
    <a href="/{{$followAll->id}}/profile">
      <div class="follow-post-images">
        <img class="logo" src="{{ asset('storage/images/' . $followPost->user->images) }}" alt="">
      </div>
    </a>
    <div class="follow-user">
      <p>{{$followPost->user->username}}</p>
      <p>{{$followPost->post}}</p>
    </div>
    <p class="follow-update">{{$followPost->updated_at}}</p>
  </li>
  @endforeach
</ul>

@endsection
