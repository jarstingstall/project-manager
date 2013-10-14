<?php

class Contact extends Eloquent {
	protected $guarded = array();

	public function client()
	{
		return $this->belongsTo('Client');
	}
}