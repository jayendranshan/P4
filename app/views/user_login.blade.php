@extends('Header')

@section('title')
	Log in
@stop


@section('content')

<div class="container">

<h1>Log in</h1> <br> <br>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }} <br>

    {{ Form::label('password') }}
    {{ Form::password('password') }} <br> <br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div>

@stop