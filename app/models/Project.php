<?php

class Project extends Eloquent {

	protected $guarded = array();

	public function tasks()
	{
		return $this->hasMany('Task');
	}

	public function timelogs()
	{
		return $this->hasMany('Timelog');
	}

	public function getTasksCount($projects)
	{
		foreach($projects as $project) {
			$project->count = $project->tasks()->count();
		}
	}

}