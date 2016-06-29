<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\LostPasswordModel; //Permet d'importer la classe BarModel que l'on pourra instancier via new Bar();
use \W\Security\AuthentificationModel as Auth;
use \W\Model\UsersModel;
use \finfo;

class PasswordController extends Controller
{

	/**
	 * page lostpassword
	**/
	public function resetPassword($token){
		$lostPasswordModel = new LostPasswordModel();
		$auth = new Auth();

		$params = [];
		$params['errors'] = [];
		$params['success'] = false;
		$params['reset_pswd'] = true;

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['form'])){
				if($post['form'] == 'reset'){
					if(isset($post['password'])){
						if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['password']) == 0){
							$params['errors'][] = 'Votre mot de passe doit contenir au moins une majuscule et un chiffre.';
						}
					}
					if(isset($post['password_confirm'])){
						if($post['password'] != $post['password_confirm']){
							$params['errors'][] = 'Les mots de passe ne correspondent pas.';
						}
					}
					if($tokenGet = $lostPasswordModel->tokenOk($token)){
						if(count($params['errors']) == 0){
							if($lostPasswordModel->changePassword($tokenGet['email'], $auth->hashPassword($post['password']))){
								// supression du token
								if($lostPasswordModel->delete($tokenGet['id'])){
									$params['success'] = true;
								}
							}
						}
					}
					else{
						$params['errors'][] = 'Votre demande de réinitialisation a expiré ou n\'éxiste pas.';
					}
				}
			}
		}

		$this->show('default/LostPassword', $params);
	}

	/**
	 * page lostpassword
	**/
	public function lostPassword(){
		$lostPasswordModel = new LostPasswordModel();
		$usersModel = new UsersModel();

		$params = [];
		$params['errors'] = [];
		$params['success'] = false;


		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['form'])){
				if($post['form'] == 'lost'){
					if(isset($post['email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['email']) == 0){
							$params['errors'][] = 'Votre email n\'est pas valide.';
						}
					}

					if(count($params['errors']) == 0){
						if($usersModel->emailExists($post['email'])){
							$token = md5(uniqid()); // On créer le token

							$data = [
								'email' => $post['email'],
								'date' => date('Y-m-d H:i:s'),
								'date_exp' => date('Y-m-d H:i:s', strtotime('+ 5 min')),
								'token' => $token
							];
							if($lostPasswordModel->insert($data)){
								// envoie du token par email
								$app = getapp();
								$mail = new PHPMailer();

								$reponse = generateUrl('/lostpassword/', ['token' => $token], true);
								var_dump($reponse);

								$mail->isSMTP();                                      // Set mailer to use SMTP
								$mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                               // Enable SMTP authentication
								$mail->Username = $app->getConfig('user_mailer');                 // SMTP username
								$mail->Password = $app->getConfig('pswd_mailer');                           // SMTP password
								$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                                    // TCP port to connect to

								$mail->setFrom('resetpassword@obar.fr');
								$mail->addAddress($post['email']);     // Add a recipient

								$mail->isHTML(true);                                  // Set email format to HTML

								$mail->Subject = 'Here is the subject';
								$mail->Body    = $reponse;
								$mail->AltBody = 'changer d\'ébergeur d\'email';

								if($mail->send()) {
									return true;
								} else {
									return false;
								}

								$params['success'] = true;
							}
							else{
								$params['errors'][] = 'Erreur lors de la creation du token.';
							}
						}
						else{
							$params['errors'][] = 'L\'email n\'existe pas.';
						}
					}
				}
			}
		}

		$this->show('default/LostPassword', $params);
	}
}
