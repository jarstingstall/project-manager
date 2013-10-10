@extends('master')
@section('main-content')
<div class="one-column-wrap">
<div class="top-bar">
	{{ link_to_route('projects.index', 'My Projects')}}
	{{ link_to_route('invoices.index', 'My Invoices')}}
</div>
<div class="one-column-content">
	<h1>Add work type.</h1>
	
	{{ Form::open(array
		('route' => array('worktypes.store'))
	) }}
	
	<ul>
	<li>
		
		{{ Form::label('title', 'Title ') }}
		{{ Form::text('title') }}

	</li>
	<li>
		
		{{ Form::label('hourly_rate', 'Hourly Rate ') }}
		{{ Form::text('hourly_rate') }}

	</li>
	<li>
		
		{{ Form::submit('Add Work Type', array('class' => 'red-btn')) }}

	</li>
	</ul>
	
	{{ Form::close() }}
</div>
</div>
@stop