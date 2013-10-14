@extends('master')
@section('main-content')
<div class="one-column-wrap">
<div class="top-bar">
	{{ link_to_route('projects.index', 'My Projects')}}
	{{ link_to_route('invoices.index', 'My Invoices')}}
</div>
<div class="one-column-content">
	<h1>Add new project.</h1>

	{{ Form::open(array
		('route' => array('projects.store'))
	) }}

	<ul>
	<li>

		{{ Form::label('title', 'Title ') }}
		{{ Form::text('title') }}

	</li>
	<li>

		{{ Form::label('client', 'Client ') }}
		{{ Form::text('client') }}

	</li>
	<li>

		{{ Form::label('dealer', 'Dealer ') }}
		{{ Form::text('dealer') }}

	</li>
	<li>

		{{ Form::label('proposal_id', 'Proposal ID ') }}
		{{ Form::text('proposal_id') }}

	</li>
	<li>

		{{ Form::label('work_type', 'Work Type ') }}
		{{ Form::select('work_type', [
			'Basic Updates' => 'Basic Updates',
			'Site Enhancements' => 'Site Enhancements',
			'Mobile Site' => 'Mobile Site',
			'Site Redesign' => 'Site Redesign',
			'Site Rebuild' => 'Site Rebuild'
		]) }}

	</li>
	<li>

		{{ Form::submit('Add Project', array('class' => 'red-btn')) }}

	</li>
	</ul>

	{{ Form::close() }}
</div>
</div>
@stop