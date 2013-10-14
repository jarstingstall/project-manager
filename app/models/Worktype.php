<?php

class Worktype extends Eloquent {

	protected $guarded = array();

	public function getHourlyRate($project)
	{
		return $this->whereTitle($project->work_type)->pluck('hourly_rate');
	}

}