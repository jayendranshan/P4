@extends('Header')

@section('title')
	Edit Survey
@stop

@section('content')
	<h1>Edit survey question and answers</h1>


<div class="container">
	{{ Form::open(array('action' => 'SurveyController@postEdit')) }}

		@foreach($question as $question)
			{{ Form::hidden('qid',$question['id']); }}
			{{ Form::label('QuestionLabel','Question') }}
			{{ Form::text('qtext',$question['questiontext']); }} <br />

		@endforeach
		
		@foreach($answers as $answer)
		
			{{ Form::hidden('a'.$idCount++,$answer['id']); }}
			{{ Form::label('answer1','Option'.$idOption++) }}
			{{ Form::text('Answer'.$idOptionid++,$answer['answertext']); }}<br />

		@endforeach
		<br />
		{{ Form::submit('Edit'); }}

	{{ Form::close() }}
</div>
	
@stop