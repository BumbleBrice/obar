<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\NewsletterModel as Newsletter;

class NewsletterController extends Controller
{
	public function newsletter(){
		$this->show('adminNews/news_letter');
	}

	public function add_subscribers($email){
		$Newsletter = new Newsletter();

		$data = ['email' => $email];

		$Newsletter->insert($data);
	}
}
