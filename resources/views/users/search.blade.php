@extends('layouts.login')

@section('content')
<div>
  <form action="/search" method="GET">
    <input type="text" name="search" placeholder="ユーザ名で検索" value="">
    <input type="submit" value="虫眼鏡">
    <i class="fa fa-search"></i>
    <!-- 検索ワード表示 -->
    <p>{{ session('search')}}</p>
  </form>
</div>

<!-- 保存されているレコードを一覧表示 -->

@foreach($users as $user)
<tr>
  <td>{{$user->username}}</td>
</tr>


@endforeach


@endsection
