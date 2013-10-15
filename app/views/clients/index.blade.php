@extends('master')

@section('main-content')
<div class="one-column-wrap">
	@include('_partials.navigation')
	<div class="one-column-content">
		<header>
		<h1>My clients.</h1>
		{{ link_to_route('clients.create', 'Add Client', null, array('class' => 'red-btn'))}}
		</header>
		<ul>
			@foreach($clients as $client)

				<div class="task-container">
					<li>
						<h3>{{ link_to_route('clients.show', $client->name, $client->id) }}</h3>
					</li>
				</div>

			@endforeach
		</ul>
	</div>
</div>
@stop
