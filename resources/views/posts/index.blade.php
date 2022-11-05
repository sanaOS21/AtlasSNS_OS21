@extends('layouts.login')

@section('content')

<!-- 投稿フォーム作成 -->
<form method="post" action="/post-create">
  @csrf

  <div class="form-group">
    <input type="text" class="post-input" name="post" placeholder="投稿内容を入力してください">
    <button type="submit" class="post-submit">
      <img src="{{ asset('images/post.png')}}">
    </button>

  </div>
</form>


<div class="post-contents">
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
        <div class=" content">
          <a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{ $post->id }}">
            <img src="{{asset('images/edit.png')}}" alt="">
          </a>
        </div>
      </td>

      <!-- 削除ボタン -->
      <td><a class="trash" href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')">
          <img src="{{asset('images/trash-h.png')}}" alt="">
        </a>
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
          <input class="up-submit" type="submit" value="更新" src="{{asset('images/edit.png')}}">
          {{csrf_field()}}
        </form>
        <a class="js-modal-close" href="">閉じる</a>
      </div>
    </div>
  </div>
  @endsection
