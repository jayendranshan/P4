@extends('Header')

@section('title')
	Add a new survey/poll
@stop

@section('content')

<div class="container">

	{{ Form::open(array('url' => '/survey/create')) }}


	<h2><label class="label label-default">Create a new Survey/Poll here.</label></h2> <br>

		<div class='form-group'>
		{{ Form::label('name','Survey Title',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		{{ Form::text('name'); }} 
	</div>

		<div class='form-group'>
		{{ Form::label('description','Survey Description',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;&nbsp;
		{{ Form::text('description'); }} </div>

		<div class='form-group'>
		{{ Form::label('lastvaliddate','Survey Last Valid Date',array('class' => 'label label-default')) }}
		{{ Form::text('lastvaliddate'); }}{{ Form::label('DateFormat', 'Dateformat: YYYY/MM/DD ',array('class' => 'label label-info')) }}</div>

		<div class='form-group'>
		{{ Form::submit('Add New Survey',array('class' => 'btn btn-primary')); }}
	</div>

	{{ Form::close() }}

</div>
@stop