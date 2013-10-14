

	<div class="sidebar-2-wrap">
		<div class="top-bar">Time Log</div>
		<div class="sidebar-content">
		<table cellspacing="0">
			<tr>
				<th>Date</th>
				<th>Hours</th>
			</tr>
			@if($timelogs)
			@foreach($timelogs as $timelog)
				<tr>
				<td>
					{{ date('m/d/y', strtotime($timelog->created_at)) }}
				</td>
				<td>
					{{ $timelog->hours }}
				</td>
				</tr>

			@endforeach
			@endif
			<tr>
				<td>Total</td>
				<td>
					{{$timelogs->total}}
				</td>
			</tr>
		</table>
		@if($project->completed == 0)
			{{ Form::open(array(
				'route' => array('projects.timelog', $project->id)
			)) }}
			<ul>
			<li>
				{{ Form::label('hours', 'Hours')}}
				{{ Form::text('hours') }}
			</li>
			<li>
				{{ Form::submit('Log Hours', array('class' => 'purple-btn')) }}
			</li>
			</ul>
			{{ Form::close() }}

			{{ Form::open(array(
			'method' => 'delete',
			'route' => ['projects.destroy', $project->id],
			'class' => 'complete-project'
			)) }}
			{{ Form::submit('Complete Project', ['class' => 'purple-btn']) }}
			{{ Form::close() }}
		@endif
		</div>
	</div>

