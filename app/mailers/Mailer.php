<?php namespace PM\Mailers;

use Mail;

abstract class Mailer {

	public function sendTo($to, $subject, $view, $data = [])
	{

		Mail::send($view, $data, function($message) use($to, $subject)
		{
			$message->to($to)
					->subject($subject);
		});

	}

}