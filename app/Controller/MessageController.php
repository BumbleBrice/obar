<?php
namespace Controller;


use \W\Controller\Controller;
use \Model\MessageModel;


class MessageController extends Controller
{
	public function message(){

		$this->allowTo(['admin']);

		$this->show('adminMessage/message', ['message' => $this->getMessage()]);
	}

	public function message_read($id) {

		$this->allowTo(['admin']);

		$messageModel = new MessageModel();

		$message = $messageModel->find($id);

		$email = $message['email'];

		$params = [];
		$params['errors'] = [];
		$params['message'] = $message;

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['reponse'])){
				if(preg_match('#^.{1,}$#', $post['reponse']) == 0){
					$params['errors'][] = 'error reponse';
				}
			}

			if(count($params['errors']) == 0) {
				if($this->answerMessage($email, $post['reponse'])) {
					$this->redirectToRoute('admin_message');
				}
			}
		}

		$this->show('adminMessage/message_read', $params);
	}

	public function getMessage()
	{
		$this->allowTo(['admin']);

		$message = new MessageModel();

		$message = $message->findAll('id', 'ASC');

		return $message;
	}

	public function addMessage($firstname = '', $lastname = '', $email = '', $msg = '')
	{
		$this->allowTo(['admin']);

		$message = new MessageModel();
		$date = new \DateTime('NOW');
		$date = $date->format('Y-m-d H:i:s');

		$message->insert([
			'firstname'	=> $firstname,
			'lastname' 	=> $lastname,
			'email' 	=> $email,
			'content' 	=> $msg,
			'date_add' 	=> $date,
			'message_state' => 'Non lu'
		]);
	}

	public function readMessage($id)
	{
		$this->allowTo(['admin']);

		$message = new MessageModel();
		$data = [
			'message_state' => 'Lu'
		];

		$message->update($data, $id);
	}
	public function answerMessage($email, $reponse)
	{
		$this->allowTo(['admin']);

		$app = getapp();
		$mail = new \PHPMailer();

		$mail->isSMTP();                                      	// Set mailer to use SMTP
		$mail->Host = $app->getConfig('host_mailer');  			// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               	// Enable SMTP authentication
		$mail->Username = $app->getConfig('user_mailer');     	// SMTP username
		$mail->Password = $app->getConfig('pswd_mailer');     	// SMTP password
		$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    	// TCP port to connect to

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
		$this->allowTo(['admin']);
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