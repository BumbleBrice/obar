<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\NewsletterModel as Newsletter;

class NewsletterController extends Controller
{
	$Newsletter = new Newsletter();

	public function add_subscribers($email){

		

		$data = ['email' => $email];

		$Newsletter->insert($data);
	}
}
