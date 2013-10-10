<?php

class ProjectTasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$tasks = Task::whereProjectId($id)->get();
		$timelogs = Timelog::whereProjectId($id)->get();
		$timelogs->total = Timelog::whereProjectId($id)->sum('hours');
		$project = Project::find($id);

		return View::make('tasks.index')
			->with('tasks', $tasks)
			->with('timelogs', $timelogs)
			->with('project', $project);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$project = Project::find($id);

		return View::make('tasks.create')
			->with('id', $id)
			->with('project', $project);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		Task::create(array(

			'title' => Input::get('title'),
			'project_id' => $id

		));

		return Redirect::route('projects.tasks.index', $id);
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($projectId, $taskId)
	{
		Task::findOrFail($taskId)->delete();

		return Redirect::route('projects.tasks.index', $projectId);
	}

}