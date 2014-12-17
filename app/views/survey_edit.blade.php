@extends('Header')

@section('title')
	Edit Survey
@stop

@section('content')
	<h2><label class="label label-default">Edit question and answers for the survey {{{$survey->name}}}</label></h2>

<div class="container">
	{{ Form::open(array('action' => 'SurveyController@postEdit')) }}

		@foreach($survey->question as $question)
			{{ Form::hidden('qid',$question['id']); }}
			{{ Form::label('QuestionLabel','Question',array('class' => 'label label-default')) }}
			{{ Form::text('qtext',$question['questiontext']); }} <br />

		@endforeach
		
		@foreach($survey->answer as $answer)
		
			{{ Form::hidden('a'.$idCount++,$answer['id']); }}
			{{ Form::label('answer1','Option'.$idOption++,array('class' => 'label label-default')) }}
			{{ Form::text('Answer'.$idOptionid++,$answer['answertext']); }}<br />

		@endforeach
		<br />
		{{ Form::submit('Update',array('class' => 'btn btn-primary')); }}

	{{ Form::close() }}
</div>
	
@stop