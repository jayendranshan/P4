@extends('Header')

@section('title')
	Add a new survey/poll
@stop

@section('content')

<div class="container">
	<h1>Add a new survey/poll</h1>

	{{ Form::open(array('url' => '/survey/create')) }}


	<h1>Please create new Survey/Poll here.</h1>

		{{ Form::label('name','Survey Title') }}
		{{ Form::text('name'); }}

		{{ Form::label('description','Survey Description') }}
		{{ Form::text('description'); }}

		{{ Form::label('lastvaliddate','Survey Last Valid Date') }}
		{{ Form::text('lastvaliddate'); }}

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

</div>
@stop