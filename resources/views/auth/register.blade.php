@extends('layouts.logout')

@section('content')

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
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
    {{ Form::text('password',null,['class' => 'input']) }}



    {{ Form::label('パスワード確認') }}
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}
  </div>
  {{ Form::submit('登録',['class' => 'login-submit']) }}

  <p><a class="login-register" href="/login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close(['url'=>'login']) !!}


@endsection
