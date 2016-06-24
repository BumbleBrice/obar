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

	public function readMessage($id)
	{
		$message = new MessageModel();
		$data = [
			'message_state' => 'read'
		];

		$message->update($data, $id);
	}
	public function answerMessage($email, $reponse)
	{
		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'user@example.com';                 // SMTP username
		$mail->Password = 'secret';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('from@example.com', 'Mailer');
		$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if($mail->send()) {
		    return true;
		} else {
		    return false;
		}
	}

}
