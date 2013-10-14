<?php

use PM\Mailers\InvoiceMailer;

class InvoicesController extends \BaseController {

	protected $mailer;

	public function __construct(InvoiceMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$invoices = Invoice::all();

		return View::make('invoices.index', compact('invoices'));
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
		Invoice::create(Input::all());

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

		// Many to many
		// $projects = $invoice->projects;

		$projects = Project::all();
		$worktype = new Worktype;


		$total = 0;

		foreach($projects as $project) {
			$project->hours = $project->timelogs()->whereInvoiceId($id)->sum('hours');
			$project->rate = $worktype->getHourlyRate($project);
			$project->total = number_format($project->hours * $project->rate, 2);
			$total += $project->total;
		}

		$invoice->total = number_format($total, 2);

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
		$invoice = Invoice::find($id);
		$invoice->sent = 1;
		$invoice->save();

		$data = $invoice->toArray();
		$this->mailer->sendInvoice($data);

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