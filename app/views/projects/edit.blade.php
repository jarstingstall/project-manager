@extends('master')
@section('main-content')
<div class="content-wrap">
<div class="top-bar">
	{{ link_to_route('projects.index', 'My Projects')}}
</div>
<div class="content">
	<header>
	<h1>Update project info.</h1>
	{{ link_to_route('projects.show', 'Back To Project', $project->id, array('class' => 'purple-btn'))}}
	</header>
	{{ Form::model($project, array(
		'method' =>'put',
		'route' => array('projects.update', $project->id))
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
			{{ Form::submit('Update Info', array('class' => 'red-btn')) }}
		</li>
	</ul>

	{{ Form::close() }}
</div>
</div>
@stop

@section('sidebar')

@include('sidebar-1')

@include('sidebar-2')

@stop