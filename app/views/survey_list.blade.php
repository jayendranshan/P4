@extends('Header')

@section('title')
	Survey
@stop

@section('content')

<div class="container">
	@if(Auth::check())
	<br>
		<div class="well well-sm">
			<a href="/survey/create">Create New Survey</a>
		</div>

		<h2><label class="label label-default">Available Survey's</label></h2> <br>
		<div class="well well-sm">
		@foreach($surveys as $survey)	
			<ul>
				<li>
					<label name='$survey->id'>{{ $survey->name }}</label>
					<a href='/survey/edit/{{ $survey->id }}'>EditSurvey</a>
					<a href='/survey/delete/{{ $survey->id }}'>DeleteSurvey</a>
					<a href='/survey/result/{{ $survey->id }}'>ViewResult</a>
				</li>
			</ul>		
		@endforeach
		</div>
		@endif
</div>
@stop