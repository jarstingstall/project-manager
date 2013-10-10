<?php namespace PM\Mailers;

class InvoiceMailer extends Mailer {

	public function sendInvoice($data = [])
	{
		$to = 'jrarst01@gmail.com';
		$view = 'emails.invoice';
		$subject = 'New Invoice From John Arstingstall';
		$this->sendTo($to, $subject, $view, $data);
	}

}