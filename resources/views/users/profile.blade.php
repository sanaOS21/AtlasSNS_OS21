@extends('layouts.login')

@section('content')

@if(isset($errors))
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif
{!! Form::open(['url' => '/profile','files'=>true]) !!}

<p>{{ Form::label('username','user name')}}</p>
<p>{{ Form::text('username',$auth->username,['class' => 'input'])}}</p>

<p>{{ Form::label('e-mail','mail address')}}</p>
<p>{{ Form::text('mail',$auth->mail,['class' => 'input'])}}</p>

<p>{{ Form::label('password','password')}}</p>
<p>{{ Form::text('password', null,['class' => 'input'])}}</p>

<p>{{ Form::label('password_confirm','password confirm')}}</p>
<p>{{ Form::text('password_confirmation',null,['class' => 'input'])}}</p>

<p>{{ Form::label('bio','bio')}}</p>
<p>{{ Form::text('bio',$auth->bio,['class' => 'input'])}}</p>

<p>{{ Form::label('icon image','icon image')}}</p>
<div class="images-label">
  <p>{{ Form::file('images',['class'=>'images'])}}</p>
</div>

{{Form::submit('更新',['class' => 'profile-submit'])}}

{!! Form::close() !!}


@endsection
