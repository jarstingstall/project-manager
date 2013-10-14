@extends('master')

@section('main-content')

<div class="content-wrap">

@include('_partials.navigation')

<div class="content tasks-list">

<header>
	<h1>{{ $project->dealer }}</h1>
	<p>{{ $project->title }}</p>
		{{ link_to_route('projects.tasks.create', 'Add Task', $project->id, array('class' => 'red-btn')) }}
</header>

<ul>

	@foreach($tasks as $task)
		<div class="task-container">
			<li>

				<p>{{ $task->title }}</p>

				<p class="date">{{ date('m/d/y', strtotime($task->created_at)) }}
				</p>

				{{ Form::open(array(
					'method' => 'delete',
					'route' => array('projects.tasks.destroy', $project->id, $task->id)
				)) }}

				{{ Form::submit('Delete Task', array('class' => 'purple-btn')) }}

				{{ Form::close() }}



			</li>
		</div>

	@endforeach

</ul>

</div>
</div>

@stop

@section('sidebar')

	@include('_partials.sidebar-1')

	@include('_partials.sidebar-2')

@stop

