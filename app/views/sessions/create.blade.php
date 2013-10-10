@extends('master')
@section('main-content')
<div class="one-column-wrap">
	<div class="top-bar">
		<h1>Project Manager</h1>
	</div>

	<div class="one-column-content">
	@if (Session::get('flash_message'))
		<div class="flash">
			{{ Session::get('flash_message') }}
		</div>
	@endif
	<h2>Login</h2>
	{{ Form::open(array('route' => 'sessions.store')) }}
		<ul>
			<li>
				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email') }}
			</li>
			<li>
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password') }}
			</li>

			<li>
				{{ Form::submit() }}
			</li>
		</ul>
	{{ Form::close() }}

	</div>
</div>

@stop