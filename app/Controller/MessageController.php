<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\MessageModel;


class MessageController extends Controller
{

	public function getMessage() 
	{
		$message = new MessageModel();
		
		$message = $message->findAll('id', 'ASC');

		return $message;
	}

	public function addMessage() 
	{
		
	}

	public function readMessage()
	{

	}
	public function answerMessage()
	{

	}
			
}
