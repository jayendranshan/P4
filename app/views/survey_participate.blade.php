@extends('Header')

@section('title')
	Take Survey
@stop

@section('content')
{{ Form::open(array('url' => '/survey/participate')) }}

		{{ Form::label('question',$questionObject['questiontext']) }}

		@foreach($answers as $answer)

			{{ Form::radio('Answer', $answerObject['id']) }} {{$answerObject['answer_text']}}
			
		@endforeach
		{{ Form::submit('Vote'); }}

	{{ Form::close() }}
	
@stop