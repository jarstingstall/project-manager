@extends('master')

@section('main-content')
<div class="one-column-wrap">
@include('_partials.navigation')

	<div class="one-column-content">
		<header>
		<h1>My completed projects.</h1>
		</header>
		<ul>
			@foreach($projects as $project)

				<div class="task-container">
					<li>
						<h3>{{ $project->dealer }}</h3>
						<p>{{ $project->title }}</p>
						{{ link_to_route('projects.show', 'View Project', $project->id, array('class' => 'purple-btn'))}}

					</li>
				</div>

			@endforeach
		</ul>
	</div>
</div>
@stop
