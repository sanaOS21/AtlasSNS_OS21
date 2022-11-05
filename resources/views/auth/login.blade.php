@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login']) !!}
<div class="login-box">
  <p class="login-welcome">AtlasSNSへようこそ</p>

  <div class="login-input-contexts">
    {{ Form::label('e-mail') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

  {{ Form::submit('ログイン') }}

  <p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close(['url' => 'register']) !!}

@endsection
