@extends('Header')

@section('title')
	JayVey
@stop

@section('content')

<div class="container">
	<h2><label class="label label-default">Add the answers for the survey</label></h2>

	{{ Form::open(array('url' => '/answer/create')) }}

		{{ Form::label('answer1','Answer1',array('class' => 'label label-default')) }}
		{{ Form::text('answer1'); }}

		{{ Form::label('answer2','Answer2',array('class' => 'label label-default')) }}
		{{ Form::text('answer2'); }}

		{{ Form::label('answer3','Answer3',array('class' => 'label label-default')) }}
		{{ Form::text('answer3'); }}

		{{ Form::submit('Add the Answers',array('class' => 'btn btn-primary')); }}

	{{ Form::close() }}

</div>

@stop