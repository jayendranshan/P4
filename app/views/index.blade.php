@extends('Header')

@section('title')
	Welcome to JayVey
@stop

@section('head')

@stop

@section('content')

<div class="container">

	<br>
	<br>
		<div class="well well-sm" style="width: 800px;">
			JayVey is survey/poll application. 
			<ul>
				<li>Questions and Anwsers can be created by the Admin user. </li>
				<li>Participant can vote in the survey/poll. </li>
			</ul>
		</div>
		<div class="well well-sm" style="width: 800px;">
			<span color="black">Returning users please login</span>
			<ul>
				<li><a href='/login'>Click here to Log in</a> </li>
			</ul>

			<span color="black">New users please sign up </span>
			<ul>
				<li><a href='/signup'>Click here to Sign up</a> </li>
			</ul>
		</div>
</div>
		

@stop