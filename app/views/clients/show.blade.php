@extends('master')

@section('main-content')

<div class="one-column-wrap">

	@include('_partials.navigation')

	<div class="one-column-content invoice">
		<h1>{{ $client->name }}</h1>
		<h3>Contact Info</h3>
		@foreach($client->contacts as $contact)
		<p>
			Name: {{$contact->name}}<br>
			Email: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a><br>
			Phone: {{$contact->phone}}
		</p>
		@endforeach
		<h3>Invoices</h3>
		@if (count($client->invoices))
			@foreach ($client->invoices as $invoice)
				<p>
					{{ link_to_route('invoices.show', 'Invoice: #'. $invoice->id, $invoice->id) }}<br>
					Billing Period: {{ date('n/d/y', strtotime($invoice->start_date))}} - {{ date('n/d/y', strtotime($invoice->end_date)) }} <br>
					Status: @if ($invoice->paid == 0) Not @endifPaid
				</p>
			@endforeach
		@else
			<p>There are no invoices for this client.</p>
		@endif
	</div>
</div>

@stop