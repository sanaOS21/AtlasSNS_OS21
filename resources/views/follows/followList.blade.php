@extends('layouts.login')

@section('content')

@foreach($followAll as $followAll)
<a class="follow-list-images" href="/{{$followAll->id}}/profile">
  <!-- asset...viewで表示するため -->
  <img class="logo" src="{{ asset('storage/images/' . $followAll->images) }}" alt="">
</a>
@endforeach

@foreach ($followPost as $followPost)
<a href="/{{$followAll->id}}/profile">
  <br>
  <img src="{{ asset('storage/images/' . $followPost->user->images) }}" alt="" width="30" height="30">
</a>
<div class="follow-user"></div>
<p>{{$followPost->user->username}}</p>
<p>{{$followPost->updated_at}}</p>
<p>{{$followPost->post}}</p>
@endforeach
</div>

@endsection
