@extends('Header')

@section('title')
	Log in
@stop

@section('content')

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

<div class="container">
    <h1>Sign up new user</h1> <br><br>
    {{ Form::open(array('url' => '/signup')) }}

        <div class='form-group'>
            {{ Form::label('UserType') }}
         	{{ Form::select('user_type', array(
                '1'       => 'Admin',
                '2'     => 'Participant'
            )) }} 
        </div>
        <div class='form-group'>
        {{ Form::label('email') }}
        {{ Form::text('email') }} </div>

        <div class='form-group'>
        {{ Form::label('password') }}
        {{ Form::password('password') }} {{ Form::label('MinCharacter', 'Min 6 characters ',array('class' => 'label label-info')) }}
        </div>
        
        <div class='form-group'>
        {{ Form::submit('Signup') }}
        </div>

    {{ Form::close() }}
</div>
@stop