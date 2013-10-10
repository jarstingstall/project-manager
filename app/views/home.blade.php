@extends('master')

@section('main-content')
<div class="one-column-wrap">
	<div class="top-bar">
		<h1>Project Manager</h1>
	</div>

	<div class="one-column-content">

	{{ Form::open() }}
	<ul>
	<li>
	{{ Form::label('email', 'Email') }}
	{{ Form::email('email') }}
	</li>
	<li>
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}
	</li>
	<li>
	{{ Form::submit('Log In', array('class' => 'purple-btn') ) }}
	</li>
	</ul>
	{{ Form::close() }}

	</div>
</div>
@stop