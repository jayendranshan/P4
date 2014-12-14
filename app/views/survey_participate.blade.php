@extends('Header')

@section('title')
	Take Survey
@stop

@section('content')

<div class="container">
{{ Form::open(array('url' => '/survey/participate')) }}

		{{ Form::label('question',$questionObject['questiontext']) }}

		@foreach($answers as $answer)

			{{ Form::radio('Answer', $answer['id']) }} {{$answer['answertext']}}
			
		@endforeach
		{{ Form::submit('Vote'); }}

	{{ Form::close() }}
</div>
	
@stop