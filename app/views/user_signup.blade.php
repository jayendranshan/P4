@extends('Header')

@section('title')
	Log in
@stop

@section('content')

@foreach($errors->all() as $message)
	<div class='alert alert-danger'>{{ $message }}</div>
@endforeach

<div class="container">
    <h2><label class="label label-default">Sign up new user</label></h2><br>
    {{ Form::open(array('url' => '/signup')) }}

        <div class='form-group'>
            {{ Form::label('UserType','UserType',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;&nbsp;
         	{{ Form::select('user_type', array(
                '1'       => 'Admin',
                '2'     => 'Participant'
            )) }} 
        </div>
        <div class='form-group'>
        {{ Form::label('email','Email',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{ Form::text('email') }} </div>

        <div class='form-group'>
        {{ Form::label('password','Password',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;&nbsp;
        {{ Form::password('password') }} {{ Form::label('MinCharacter', 'Min 6 characters ',array('class' => 'label label-info')) }}
        </div>
        
        <div class='form-group'>
        {{ Form::submit('Signup',array('class' => 'btn btn-primary')) }}
        </div>

    {{ Form::close() }}
</div>
@stop