<?php

class Invoice extends Eloquent {

	protected $guarded = array();

	public function projects()
	{
		return $this->belongsToMany('Project');
	}

}