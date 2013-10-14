@extends('master')
@section('main-content')
<div class="content-wrap">
@include('_partials.navigation')
<div class="content">
	<h1>Add new task.</h1>
	{{ Form::open(array
		('route' => array('projects.tasks.store', $id))
	) }}
	<ul>
	<li>

		{{ Form::label('title', 'Title ') }}
		{{ Form::text('title') }}

	</li>
	<li>

		{{ Form::submit('Add Task', array('class' => 'red-btn')) }}

	</li>
	</ul>
	{{ Form::close() }}
</div>
</div>
@stop

@section('sidebar')

@include('_partials.sidebar-1')

@stop