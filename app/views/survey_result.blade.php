@extends('Header')

@section('title')
	Edit Survey
@stop

@section('content')
	<h2><label class="label label-default">Result for the survey {{{$survey->name}}}</label></h2> <br>

<div class="container">

	{{ Form::label('Answer','Answer',array('class' => 'label label-default')) }}
	{{ Form::label('Count','Count',array('class' => 'label label-default')) }}
	@foreach($survey->answer as $answer)
	<div class='form-group'>
		{{ Form::label('answer1',$answer['answertext']) }}&nbsp;&nbsp;
		{{ Form::label('answer1',$answer['answerCount']) }}
	</div>

	@endforeach
</div>
	
@stop