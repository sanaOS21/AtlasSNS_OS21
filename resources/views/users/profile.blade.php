@extends('layouts.login')

@section('content')


{!! Form::open(['url' => ['/profile/{id}/update'],'method' => 'put']) !!}
{!! Form::hidden('id',$auth->id) !!}

<p>{{ Form::label('username','user name')}}</p>
<p>{{ Form::text('username',$auth->username,['class' => 'input'])}}</p>

<p>{{ Form::label('e-mail','mail adress')}}</p>


<p>{{ Form::label('password','password')}}</p>


<p>{{ Form::label('password_confirm','password confirm')}}</p>


<p>{{ Form::label('bio','bio')}}</p>


<p>{{ Form::label('icon image','icon image')}}</p>





@endsection
