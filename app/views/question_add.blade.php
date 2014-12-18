@extends('Header')

@section('title')
	Add a question
@stop

@section('content')

<div class="container">

	{{ Form::open(array('url' => '/question/create')) }}

	<h2><label class="label label-default">Add the question for the survey</label></h2> <br>

		<div class='form-group'>
		<b>{{ Form::label('question1','Question1',array('class' => 'label label-default')) }}</b>&nbsp;&nbsp;&nbsp;
		{{ Form::text('question'); }}
	</div>
	<div class='form-group'>
		{{ Form::submit('Add a question',array('class' => 'btn btn-primary')); }}
	</div>

	{{ Form::close() }}

</div>

@stop