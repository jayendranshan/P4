@extends('Header')

@section('title')
	Add a new survey/poll
@stop

@section('content')

	<h1>Add a new survey/poll</h1>

	{{ Form::open(array('url' => '/book/create')) }}


		{{ Form::label('title','Title') }}
		{{ Form::text('title'); }}

		{{ Form::label('author_id', 'Author') }}
		{{ Form::select('author_id', $authors); }}

		{{ Form::label('published','Published Year (YYYY)') }}
		{{ Form::text('published'); }}

		{{ Form::label('cover','Cover Image URL') }}
		{{ Form::text('cover'); }}

		{{ Form::label('purchase_link','Purchase Link URL') }}
		{{ Form::text('purchase_link'); }}

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop