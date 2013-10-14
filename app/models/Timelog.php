<?php

class Timelog extends Eloquent {

	protected $guarded = array();

	public function project()
	{
		return $this->belongsTo('Project');
	}

}