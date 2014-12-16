@extends('Header')

@section('title')
	Take Survey
@stop

@section('content')

<div class="container">
{{ Form::open(array('action' => 'ParticipateSurveyController@postParticipate')) }}

		@foreach($question as $question)
			{{ Form::label('question',$question['questiontext']) }} <br />
		@endforeach
		

		@foreach($answers as $answer)
			{{ Form::radio('Answer', $answer['id']) }} {{$answer['answertext']}} <br />
			
		@endforeach
		{{ Form::submit('Vote'); }}

	{{ Form::close() }}
</div>
	
@stop