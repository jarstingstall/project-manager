@extends('master')

@section('main-content')
<div class="one-column-wrap">
	<div class="top-bar">
		<h1>Project Manager</h1>
	</div>

	<div class="one-column-content">

	<h2>Welcome to your Project Manager</h2>
	<p>Click below to log in!</p>
	{{ link_to_action('SessionsController@create', 'Log In', null, ['class' => 'purple-btn']) }}

	</div>
</div>
@stop