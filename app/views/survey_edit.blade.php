@extends('Header')

@section('title')
	Edit Survey
@stop

@section('content')
	<h2><label class="label label-default">Edit question and answers for the survey {{{$survey->name}}}</label></h2> <br>

<div class="container">
	{{ Form::open(array('action' => 'SurveyController@postEdit')) }}


		@foreach($survey->question as $question)
		<div class='form-group'>
			{{ Form::hidden('qid',$question['id']); }}
			{{ Form::label('QuestionLabel','Question',array('class' => 'label label-default')) }}
			{{ Form::text('qtext',$question['questiontext']); }} </div>

		@endforeach
		
		@foreach($survey->answer as $answer)
		
		<div class='form-group'>
			{{ Form::hidden('a'.$idCount++,$answer['id']); }}
			{{ Form::label('answer1','Option'.$idOption++,array('class' => 'label label-default')) }}&nbsp;&nbsp;
			{{ Form::text('Answer'.$idOptionid++,$answer['answertext']); }}
		</div>

		@endforeach
		<br />
		{{ Form::submit('Update',array('class' => 'btn btn-primary')); }}

	{{ Form::close() }}
</div>
	
@stop