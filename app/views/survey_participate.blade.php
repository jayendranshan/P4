@extends('Header')

@section('title')
	Take Survey
@stop

@section('content')

<div class="container">
<h1>Vote for the survey {{{$survey->name}}}</h1>
{{ Form::open(array('action' => 'ParticipateSurveyController@postParticipate')) }}
		
		{{ Form::hidden('surveyid',$survey['id']); }}
		@foreach($survey->question as $question)
			{{ Form::label('question',$question['questiontext'],array('class' => 'label label-default')) }} <br />
		@endforeach
		

		@foreach($survey->answer as $answer)
			{{ Form::radio('Answer', $answer['id']) }} {{$answer['answertext']}} <br />
			
		@endforeach
		{{ Form::submit('Vote',array('class' => 'btn btn-primary')); }}

	{{ Form::close() }}
</div>
	
@stop