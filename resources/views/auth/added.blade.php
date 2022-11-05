@extends('layouts.logout')


@section('content')

<div id="clear">
  <div class="login-contents">
    <div class="login-box">
      <!-- ↓ Controllerで指示 -->
      <p class="login-welcome">{{ session('username')}}さん</p>
      <p class="login-welcome">ようこそ！AtlasSNSへ！</p>
      <p class="login-register">ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>

      <p class="add-btn"><a href="/login">ログイン画面へ</a></p>
    </div>
  </div>
</div>
@endsection
