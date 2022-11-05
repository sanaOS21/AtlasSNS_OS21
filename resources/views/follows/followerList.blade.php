@extends('layouts.login')

@section('content')

@foreach($followerAll as $followerAll)

<a class="follow-list-images" href="/{{$followerAll->id}}/profile">
  <img class="logo" src="{{ asset('storage/images/' . $followerAll->images) }}" alt="">
</a>
@endforeach

<div class="follow-user"></div>
@foreach ($followerPost as $followerPost)
<p>{{$followerPost->user->username}}</p>
<p>{{$followerPost->updated_at}}</p>
<p>{{$followerPost->post}}</p>
</div>
@endforeach




@endsection
