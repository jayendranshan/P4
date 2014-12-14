@extends('Header')

@section('title')
	Take Survey
@stop

@section('content')

<h1>Please click here to take the survey</h1>

		@foreach($surveys as $survey)

				<div>
					<ul>
						<li>
							<a href='/survey/participate/{{ $survey->id }}'>{{ $survey->name }}</a>
						</li>
					</ul>	
					
				</div>
		@endforeach
@stop