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

	public function invoices()
	{
		return $this->hasMany('Invoice');
	}

	public function getTasksCount($projects)
	{
		foreach($projects as $project) {
			$project->count = $project->tasks()->count();
		}
	}

	public function getTotalHours($timelogs)
	{
		$hours = 0;
		foreach($timelogs as $timelog)
		{
			$hours = $hours + $timelog->hours;
		}
		return $hours;
	}

}