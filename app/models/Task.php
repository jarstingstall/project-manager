<?php

class Task extends Eloquent {

	protected $guarded = array();

	public function project()
	{
		return $this->belongsTo('Project');
	}

}