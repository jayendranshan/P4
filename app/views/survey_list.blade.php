@extends('Header')

@section('title')
	Survey
@stop

@section('content')

	@if(Auth::check())
		<h1>Here are the survey's created</h1>

		@foreach($surveys as $survey)

				<div>
					<ul>
						<li>
							<label name='$survey->id'>{{ $survey->name }}</label>
							<a href='/survey/edit/{{ $survey->id }}'>EditSurvey</a>
							<a href='/survey/delete/{{ $survey->id }}'>DeleteSurvey</a>
						</li>
					</ul>	
					
				</div>
		@endforeach

				<div>
					<a href="/survey/create">Create New Survey</a>
				</div>
	@endif

@stop