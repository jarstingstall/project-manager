@extends('master')

@section('main-content')

<div class="one-column-wrap">

	@include('_partials.navigation')

	<div class="one-column-content">
		<header>
		<h1>Create a new invoice.</h1>
		{{ link_to_route('invoices.index', 'Back To Invoices', null, ['class' => 'purple-btn'])}}
		</header>

	{{ Form::open(array
		('route' => ['invoices.store'])
	) }}
	<ul>
	<li>
		{{ Form::label('client', 'Client ') }}
		{{ Form::text('client') }}
	</li>
	<li>
		{{ Form::label('start_date', 'Start Date ') }}
		<input type="date" name="start_date">
	</li>
	<li>
		{{ Form::label('end_date', 'End Date ') }}
		<input type="date" name="end_date">
	</li>
	<li>
		{{ Form::submit('Create Invoice', ['class' => 'red-btn']) }}
	</li>
	</ul>
	{{ Form::close() }}
	</div>
</div>

@stop