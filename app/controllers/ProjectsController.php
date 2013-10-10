<?php

class ProjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::whereCompleted(false)->get();

		$project = new Project();
		$project->getTasksCount($projects);

		return View::make('projects.index')
			->with('projects', $projects);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Project::create(array(
			'title' => Input::get('title'),
			'client' => Input::get('client'),
			'dealer' => Input::get('dealer'),
			'proposal_id' => Input::get('proposal_id'),
			'work_type' => Input::get('work_type')
		));

		return Redirect::route('projects.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);
		$timelogs = Timelog::whereProjectId($id)->where('billed', '=', false)->get();
		$timelogs->total = Timelog::whereProjectId($id)->where('billed', '=', false)->sum('hours');

		return View::make('projects.edit')
			->with('project', $project)
			->with('timelogs', $timelogs);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		Project::find($id)->update(array(
			'title' => Input::get('title'),
			'client' => Input::get('client'),
			'dealer' => Input::get('dealer'),
			'proposal_id' => Input::get('proposal_id'),
			'work_type' => Input::get('work_type')
		));

		return Redirect::route('projects.tasks.index', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Project::find($id)->update(array(
			'completed' => true
		));

		return Redirect::route('projects.index');
	}

}