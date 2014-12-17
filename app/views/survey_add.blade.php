@extends('Header')

@section('title')
	Add a new survey/poll
@stop

@section('content')

<div class="container">
	<h1>Add a new survey/poll</h1>

	{{ Form::open(array('url' => '/survey/create')) }}


	<h1>Please create new Survey/Poll here.</h1>

		{{ Form::label('name','Survey Title',array('class' => 'label label-default')) }}
		{{ Form::text('name'); }}

		{{ Form::label('description','Survey Description',array('class' => 'label label-default')) }}
		{{ Form::text('description'); }}

		{{ Form::label('lastvaliddate','Survey Last Valid Date',array('class' => 'label label-default')) }}
		{{ Form::text('lastvaliddate'); }}

		{{ Form::submit('Add',array('class' => 'btn btn-primary')); }}

	{{ Form::close() }}

</div>
@stop