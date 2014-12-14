@extends('Header')

@section('title')
	JayVey
@stop

@section('content')

<div class="container">
	<h1>Add the answers for the survey</h1>

	{{ Form::open(array('url' => '/answer/create')) }}


	<h1>Please add the question for the survey</h1>

		{{ Form::label('answer1','Answer1') }}
		{{ Form::text('answer1'); }}

		{{ Form::label('answer2','Answer2') }}
		{{ Form::text('answer2'); }}

		{{ Form::label('answer3','Answer3') }}
		{{ Form::text('answer3'); }}

		{{ Form::submit('Add the Answers'); }}

	{{ Form::close() }}

</div>

@stop