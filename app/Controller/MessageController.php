<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\MessageModel;


class MessageController extends Controller
{
	public function message(){
		$this->show('adminMessage/message', ['message' => $this->getMessage()]);
	}

	public function message_read($id){
		answerMessage($email, $reponse) // récuperer l'email de la perssone qui envoyer le message 
		$this->show('adminMessage/message_read', ['message' => $this->getMessage()]);
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
		$mail->AltBody = $reponse;

		if($mail->send()) {
		    return true;
		} else {
		    return false;
		}
	}

	public function message_delete($id, $delMessage)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			$MessageModel = new MessageModel();
			$Message = $MessageModel->find($id);

			// On vérifie que le paramètre GET soit ok et que la valeur soit bien Oui
			// Si tout est bon, l'utilisateur a donc comfirmer la suppression
			if (isset($delMessage) && $delMessage == 'Oui') {

				if ($MessageModel->delete($id)) {
					// Ici on a supprimer l'article
					$this->redirectToRoute('admin_message');
				}
			}

		$this->show('adminMessage/message_delete', ['message' => $Message]);
	}

}
