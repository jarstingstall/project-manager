@extends('master')

@section('main-content')

<div class="one-column-wrap">

	@include('_partials.navigation')

	<div class="one-column-content invoice">
		<h1>{{ $invoice->client }}</h1>
		Billing Period: {{ date('n/d/y', strtotime($invoice->start_date))}} - {{ date('n/d/y', strtotime($invoice->end_date)) }}<br>
		Invoice #: {{ $invoice->id }}<br>
		Status: @if($invoice->sent == false) Not Billed @else Billed @endif<br>
		Payment: @if($invoice->paid == false) Not Received @else Received @endif
		@if($invoice->sent == false)
		{{ Form::open(array(
			'method' => 'put',
			'route' => array('invoices.update', $invoice->id),
			'class' => 'bill-client'
		))}}

		{{ Form::submit('Bill Client', array('class' => 'red-btn'))}}

		{{ Form::close() }}
		@else
		{{ Form::open(array(
			'method' => 'delete',
			'route' => array('invoices.destroy', $invoice->id),
			'class' => 'bill-client'
		))}}

		{{ Form::submit('Paid In Full', array('class' => 'red-btn'))}}

		{{ Form::close() }}
		@endif
		<table cellspacing="0">
			<tr>
				<th>Work Type</th>
				<th>Client</th>
				<th>Dealer</th>
				<th>Proposal ID</th>
				<th>Hours</th>
				<th>Rate</th>
				<th>Billed</th>
			</tr>
			@foreach($projects as $project)

				@if($project->hours)

					<tr>
						<td>{{ $project->work_type }}</td>
						<td>{{ $project->client }}</td>
						<td>{{ $project->dealer }}</td>
						<td>{{ $project->proposal_id }}</td>
						<td>{{ $project->hours }}</td>
						<td>{{ $project->rate }}</td>
						<td>{{ $project->total }}</td>
					</tr>

				@endif

			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Total</td>
				<td>{{ $invoice->total }}</td>
			</tr>
		</table>
	</div>
</div>

@stop