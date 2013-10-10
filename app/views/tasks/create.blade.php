@extends('master')
@section('main-content')
<div class="content-wrap">
<div class="top-bar">
	{{ link_to_route('projects.index', 'My Projects')}}
</div>
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

@include('sidebar-1')

@stop