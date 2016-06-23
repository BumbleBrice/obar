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

	public function addMessage($firstname = '', $lastname = '', $email = '', $msg = '')
	{
		$message = new MessageModel();
		$date = new \DateTime('NOW');
		$date = $date->format('Y-m-d H:i:s');

		$message->insert([
			'firstname'	=> $firstname,
			'lastname' 	=> $lastname,
			'email' 	=> $email,
			'content' 	=> $msg,
			'date_add' 	=> $date,
			'message_state' => 'unread'
		]);
	}

	public function readMessage()
	{

	}
	public function answerMessage()
	{

	}

}
