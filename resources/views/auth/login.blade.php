@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login','class'=>'login-contents']) !!}
<div class="login-box">
  <p class="login-welcome">AtlasSNSへようこそ</p>

  <div class="login-input-contents">
    {{ Form::label('e-mail') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

  {{ Form::submit('ログイン',['class'=>'login-submit']) }}

  <p><a class="login-register" href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close(['url' => 'register']) !!}

@endsection
