@extends('layouts.login')

@section('content')
<img src="{{ asset('storage/images/' . $user_id->images) }}" alt="" width="30" height="30">
<p>name:{{$user_id->username}}</p>
<p>bio:{{$user_id->bio}}</p>

@if(Auth::user()->isFollowing($user_id->id))
<form action="/search/{{$user_id->id}}/unfollow" method="get">
  <button type="submit">フォロー解除</button>
</form>
@else
<form action="/search/{{$user_id->id}}/follow" method="get">
  <button type="submit">フォローする</button>
</form>
@endif

@foreach ($userPost as $userPost)
<img src="{{ asset('storage/images/' . $userPost->user->images) }}" alt="" width="30" height="30">
</a>
<p>{{$userPost->username}}</p>
<p>{{$userPost->updated_at}}</p>
<p>{{$userPost->post}}</p>
@endforeach



@endsection
