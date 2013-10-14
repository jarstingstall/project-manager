@extends('master')

@section('main-content')
<div class="one-column-wrap">
@include('_partials.navigation')

	<div class="one-column-content">
		<header>
		<h1>Work types.</h1>
		{{ link_to_route('worktypes.create', 'Add Work Type', null, array('class' => 'red-btn'))}}
		</header>
		<ul>
			@foreach($worktypes as $worktype)

				<div class="task-container">
					<li>
						<h3>{{ $worktype->title }}</h3>
						Hourly Rate: {{ $worktype->hourly_rate }}
					</li>
				</div>

			@endforeach
		</ul>
	</div>
</div>
@stop
