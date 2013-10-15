<?php

class Client extends Eloquent {
	protected $guarded = array();

	public function contacts()
	{
		return $this->hasMany('Contact');
	}

	public function invoices()
	{
		return $this->hasMany('Invoice');
	}
}