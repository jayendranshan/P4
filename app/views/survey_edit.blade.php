@extends('Header')

@section('title')
	Edit Survey
@stop

@section('content')
	<h1>Here are the survey's created</h1>

	

	{{ Form::open(array('url' => '/survey/edit')) }}

		{{ Form::label('question1','Question1') }}
		{{ Form::text('question',$question['questiontext']); }}

		@foreach($answers as $answer)

			{{ Form::label('answer1','Answer1') }}
			{{ Form::text('answer1',$answer['answertext']); }}

		@endforeach
		{{ Form::submit('Edit Survey question/answers'); }}

	{{ Form::close() }}

@stop