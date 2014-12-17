@extends('Header')

@section('title')
	Log in
@stop


@section('content')

<div class="container">

<h2><label class="label label-default">Log in</label></h2><br>

{{ Form::open(array('url' => '/login')) }}
	
	<div class='form-group'>
    {{ Form::label('email','Email',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;
    {{ Form::text('email') }} 
	</div>

	<div class='form-group'>
    {{ Form::label('password','Password',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;
    {{ Form::password('password') }} 
	</div>

	<div class='form-group'>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{ Form::submit('Submit',array('class' => 'btn btn-primary')) }}
</div>

{{ Form::close() }}
</div>

@stop