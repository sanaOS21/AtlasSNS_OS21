@extends('layouts.login')

@section('content')


{!! Form::open(['url' => ['/profile'],'method' => 'post']) !!}
{!! Form::hidden('id',$auth->id) !!}

<p>{{ Form::label('username','user name')}}</p>
<p>{{ Form::text('username',$auth->username,['class' => 'input'])}}</p>

<p>{{ Form::label('e-mail','mail adress')}}</p>
<p>{{ Form::text('mail',$auth->mail,['class' => 'input'])}}</p>

<p>{{ Form::label('password','password')}}</p>
<p>{{ Form::text('password',$auth->password,['class' => 'input'])}}</p>

<p>{{ Form::label('password_confirm','password confirm')}}</p>
<p>{{ Form::text('password_confirm',$auth->password_confirm,['class' => 'input'])}}</p>

<p>{{ Form::label('bio','bio')}}</p>
<p>{{ Form::text('bio',$auth->bio,['class' => 'input'])}}</p>


<p>{{ Form::label('icon image','icon image')}}</p>





@endsection
