@extends('layouts.login')

@section('content')

<!-- 投稿フォーム作成 -->
<form method="post" action="/post-create">
  @csrf

  <div class="form-group">
    <!-- アイコン入ってない時 -->
    @if (Auth::user()->images==='noimage.png')
    <p><img src="{{ asset('storage/images/noimage.png')}}" class="logo" alt=""></p>
    @else
    <p><img src=" {{ asset('storage/images/' . Auth::user()->images) }}" class="logo"></p>
    @endif
    <input type="text" class="post-input" name="post" placeholder="投稿内容を入力してください" required="required">
    <button type="submit" class="post-submit">
      <img src="{{ asset('images/post.png')}}">
    </button>

  </div>
</form>


@foreach($followPost as $followPost)
<ul class="post-contents">
  <li class="post-contents-images">
    <img src="{{ asset( 'storage/images/' . $followPost->user->images) }}" class="logo">
  </li>
  <li class="post-contents-posts">
    <p>{{ $followPost->user->username }}</p>
    <p>{{ $followPost->post }}</p>
  </li>

  <li class="post-contents-update">
    <p>{{ $followPost->updated_at }}</p>

    @if ($followPost->user_id === Auth::user()->id)
    <div class="edit-box">
      <!-- モーダルを開くボタン -->
      <div>
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="/top/posts/update" post="{{ $followPost->post }}" post_id="{{ $followPost->id }}">
          <img src="{{ asset('images/edit.png')}}">
        </a>
      </div>
      <!-- 削除ボタン -->
      <div>
        <a class="trash" href="/top/{{$followPost->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          <img src="{{ asset('images/trash-h.png')}}">
        </a>
      </div>
    </div>
  </li>
  @endif
</ul>

@endforeach
<!-- モーダル内 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="post/update" method="post">
      <textarea class="modal_post" name="up_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input class="up-submit" type="image" value="更新" src="{{asset('images/edit.png')}}">
      {{csrf_field()}}
  </div>
  </form>
  <a class="js-modal-close" href="">閉じる</a>
</div>
@endsection
