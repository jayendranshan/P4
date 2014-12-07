@extends('Header')

@section('title')
	Log in
@stop

@section('content')
<h1>Sign up</h1>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

 	{{ Form::select('user_type', array(
        '1'       => 'Admin',
        '2'     => 'Participant'
    )) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}
    
    <small>Min 6 characters</small>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop