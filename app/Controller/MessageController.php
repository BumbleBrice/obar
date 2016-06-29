<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\MessageModel;


class MessageController extends Controller
{
	public function message(){
		$this->show('adminMessage/message', ['message' => $this->getMessage()]);
	}

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
		$app = getapp();
		$mail = new PHPMailer();


		$mail->isSMTP();                                      	// Set mailer to use SMTP
		$mail->Host = 'smtp.mailgun.org';  					  	// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               	// Enable SMTP authentication
		$mail->Username = $app->getConfig('user_mailer');     	// SMTP username
		$mail->Password = $app->getConfig('pswd_mailer');     	// SMTP password
		$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    	// TCP port to connect to

		$mail->setFrom('reponse@obar.fr');
		$mail->addAddress($email);     						  	// Add a recipient

		$mail->isHTML(true);                                  	// Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = $reponse;
		$mail->AltBody = 'changer d\'bergeur d\'email';

		if($mail->send()) {
		    return true;
		} else {
		    return false;
		}
	}

}
