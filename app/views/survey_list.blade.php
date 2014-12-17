@extends('Header')

@section('title')
	Survey
@stop

@section('content')

<div class="container">
	@if(Auth::check())
		<h2><label class="label label-default">Available Survey's</label></h2>

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
</div>
@stop