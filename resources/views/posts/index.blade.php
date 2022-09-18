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
      <!-- 編集ボタン 参考サイトのまんま-->
      <td>
        <div class="content">
          <a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{ $post->id }}">編集</a>
        </div>
      </td>

      <!-- 削除ボタン -->
      <td><a href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')">削除</a>
      </td>
      </tda>
    </tr>
    @endforeach
    <!-- モーダル内 -->
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="post/update" method="post">
          <textarea class="modal_post" name="up_post"></textarea>
          <input type="hidden" name="id" class="modal_id" value="{{$post->id}}">
          <input type="submit" value="更新">
          {{csrf_field()}}
        </form>
        <a class="js-modal-close" href="">閉じる</a>
      </div>
    </div>
  </div>
  @endsection
