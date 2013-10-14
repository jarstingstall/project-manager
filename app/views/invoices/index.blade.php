@extends('master')

@section('main-content')

<div class="one-column-wrap">

	@include('_partials.navigation')

	<div class="one-column-content">
		<header>
		<h1>My outstanding invoices.</h1>
		{{ link_to_route('invoices.create', 'Create Invoice', null, array('class' => 'red-btn'))}}
		</header>
		<ul>
			@foreach($invoices as $invoice)

				<div class="task-container invoice-list">
					<li>
						<h3>{{ $invoice->client }}</h3>
						Billing Period: {{ date('n/d/y', strtotime($invoice->start_date))}} - {{ date('n/d/y', strtotime($invoice->end_date)) }}
						<br>
						{{ link_to_route('invoices.show', 'View invoice', $invoice->id, array('class' => 'purple-btn'))}}
					</li>
				</div>

			@endforeach
		</ul>
	</div>
</div>

@stop