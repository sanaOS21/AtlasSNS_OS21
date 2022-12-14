@extends('layouts.logout')

@section('content')

<ul class="login-errors">
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
{!!Form::open(['url' => 'register','class'=>'login-contents' ])!!}
@csrf
<div class="login-box">
  <h2 class="login-welcome">新規ユーザー登録</h2>

  <div class="login-input-contents">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}


    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}


    {{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}



    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}
  </div>
  {{ Form::submit('登録',['class' => 'login-submit']) }}

  <p><a class="login-register" href="/login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close(['url'=>'login']) !!}


@endsection
