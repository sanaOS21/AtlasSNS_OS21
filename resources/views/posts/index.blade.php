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
          <a class="js-model-open" href="" post="{{$post->post}}" id="{{ $post->id }}">編集</a>
          <!-- モーダル内の動き -->
          <div class="modal js-modal">
            <div class="modal_bg js-modal-close"></div>
            <div class="modal_content">
              <form action="{{ route('posts.update') }}" method="post">
                @csrf
                <textarea class="modal_post" name="up_post"></textarea>
                <input type="hidden" name="id" class="modal_is" value="{{$post->id}}">
                <div class="btn-zone">
                  <input class="edit-btn2 modal_id" type="image" src="{{ asset('images/edit.png') }}" value="更新" alt="更新">
                  <a class="js-modal-close close-btn" href="">閉じる</a>
                </div>
              </form>
            </div>
          </div>




        </div>
      </td>
      <form action="/top">
        <input type="hidden" value="{{$post->id}}">
        <input type="textarea" name='upPost' value="{{$post->post}}">
        <input type="submit" value="更新">
      </form>

      <!-- 削除ボタン -->
      <td><a href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')">削除</a>
      </td>
      </tda>
    </tr>
    @endforeach

  </div>
</div>
@endsection
