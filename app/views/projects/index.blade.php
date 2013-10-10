@extends('master')

@section('main-content')
<div class="one-column-wrap">
	<div class="top-bar">
		{{ link_to_route('projects.index', 'My Projects') }}
		{{ link_to_route('invoices.index', 'My Invoices') }}
		{{ link_to_action('SessionsController@destroy', 'Log Out') }}
	</div>

	<div class="one-column-content">
		<header>
		<h1>My active projects.</h1>
		{{ link_to_route('projects.create', 'Add Project', null, array('class' => 'red-btn'))}}
		{{ link_to('/completed', 'View Completed Projects', array('class' => 'red-btn'))}}
		</header>
		<ul>
			@foreach($projects as $project)

				<div class="task-container">
					<li>
						<h3>{{ $project->dealer }}</h3>
						{{ $project->title }}
						@if ($project->count != 1)
							<p>{{ $project->count }} incomplete tasks</p>
						@else
							<p>{{ $project->count }} incomplete task</p>
						@endif

						{{ link_to_route('projects.show', 'View Project', $project->id, array('class' => 'purple-btn'))}}
						<p class="date">{{ date('m/d/y', strtotime($project->created_at)) }}</p>

					</li>
				</div>

			@endforeach
		</ul>
	</div>
</div>
@stop
