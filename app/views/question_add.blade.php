@extends('Header')

@section('title')
	Add a question
@stop

@section('content')

	@if(Auth::check())
		
	@endif

	<h1>Add a question for the survey</h1>

	{{ Form::open(array('url' => '/question/create')) }}


	<h1>Please add the question for the survey</h1>

		{{ Form::label('question1','Question1') }}
		{{ Form::text('question'); }}

		{{ Form::submit('Add a question'); }}

	{{ Form::close() }}

@stop