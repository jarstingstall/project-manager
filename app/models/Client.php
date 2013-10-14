<?php

class Client extends Eloquent {
	protected $guarded = array();

	public function contacts()
	{
		return $this->hasMany('Contact');
	}
}