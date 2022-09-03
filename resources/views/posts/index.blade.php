@extends('layouts.login')

@section('content')
<div class="main">
  <h2>機能を実装していきましょう。</h2>
  <!-- 投稿フォーム作成 -->
  <form action="/top" method="post">
    @csrf
    <input type="hidden" name="user_id" value="">
    <input type="text" class="form" name="post" placeholder="投稿内容を入力してください">
    <input type="submit" class="btn btn-primary" value="飛行機">
  </form>
</div>
<div class=card-body>

</div>
@endsection
