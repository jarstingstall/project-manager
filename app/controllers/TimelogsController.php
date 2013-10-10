<?php

class TimelogsController extends \BaseController {

	public function store($id) {

		$invoice_id = DB::table('invoices')->orderby('id', 'desc')->take(1)->pluck('id');

		Timelog::create(array(
			'hours' => Input::get('hours'),
			'project_id' => $id,
			'invoice_id' => $invoice_id
		));

		return Redirect::action('ProjectTasksController@index', $id);

	}


}