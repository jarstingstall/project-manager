<?php

class InvoicesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$invoices = Invoice::all();

		return View::make('invoices.index')
			->with('invoices', $invoices);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('invoices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Invoice::create(array(
			'client' => Input::get('client'),
			'start_date' => Input::get('start_date'),
			'end_date' => Input::get('end_date')
		));

		return Redirect::route('invoices.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$invoice = Invoice::find($id);
		$projects = Project::all();

		$invoice->total = 0;

		foreach($projects as $project) {
			$project->hours = $project->timelogs()->whereInvoiceId($id)->sum('hours');
			$project->rate = Worktype::whereTitle($project->work_type)->pluck('hourly_rate');
			$project->total = number_format($project->hours * $project->rate, 2);
			$invoice->total += $project->total;
		}

		$invoice->total = number_format($invoice->total, 2);

		return View::make('invoices.show')
			->with('invoice', $invoice)
			->with('projects', $projects);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Invoice::find($id)->update(array(
			'sent' => 1
		));


		return Redirect::route('invoices.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Invoice::find($id)->update(array(
			'paid' => 1
		));

		return Redirect::route('invoices.index');
	}

}