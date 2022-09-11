@extends('layouts.login')

@section('content')

<!-- 投稿フォーム作成 -->
<form method="post" action="/post-create">
  @csrf

  <div class="main">
    <input type="text" class="form" name="post" placeholder="投稿内容を入力してください">
    <input type="submit" class="btn btn-primary" value="飛行機">

  </div>
</form>


<div class=card-body>
  @foreach($posts as $post)
  <div class="tweet-area">
    <tr>
      <td>
        {{$post->user->username}}
      </td>
      <p>
        <td>
          {{$post->post}}
        </td>
      </p>
      <!-- 削除ボタン -->
      <td><a href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')">削除</a>
      </td>
      </tda>
    </tr>
    @endforeach
  </div>
</div>
@endsection
