@extends('layouts.login')

@section('content')

<div class="user_profile">

  <p>{{ Form::label('username','user name')}}</p>
  <!-- <p>{{ Form::text('username',$auth->username,['class'=>'input'])</p> -->

  <p>{{ Form::label('e-mail','mail adress')}}</p>
  <!-- <p>{{ Form::text('username',$auth->username,['class'=>'input'])</p> -->

  <p>{{ Form::label('password','password')}}</p>
  <!-- <p>{{ Form::text('username',$auth->username,['class'=>'input'])</p> -->

  <p>{{ Form::label('password_confirm','password confirm')}}</p>
  <!-- <p>{{ Form::text('username',$auth->username,['class'=>'input'])</p> -->

  <p>{{ Form::label('bio','bio')}}</p>
  <!-- <p>{{ Form::text('username',$auth->username,['class'=>'input'])</p> -->

  <p>{{ Form::label('icon image','icon image')}}</p>
  <!-- <p>{{ Form::text('username',$auth->username,['class'=>'input'])</p> -->


</div>


@endsection
