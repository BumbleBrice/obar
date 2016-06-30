<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel as UsersModel; //Permet d'importer la classe UsersModel que l'on pourra instancier via new UsersModel();
use \W\Security\AuthentificationModel as AuthModel; //Permet d'importer la classe AuthentificationModel pour hacher le password
use \Model\BarModel as Bar;
use \Model\ConfirmationModel as Confirmation;
use \Model\PresentationModel as Presentation; //Permet d'importer la calsse PresentationModel pour la présentation du site

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		//Instancie les classes
		$confirmation = new Confirmation();
		$usersModel = new UsersModel();
		$authModel = new AuthModel();
		$barModel = new Bar();
		$presentationModel = new Presentation();

		$messageController = new \Controller\MessageController();

		$errors = [];// tableau de tablau d'erreurs
		$errors['connexion'] = [];// tableau d'erreurs pour le formulaire de connexion
		$errors['register'] = [];// tableau d'erreurs pour le formulaire d'inscription
		$errors['contact'] = [];// tableau d'erreurs pour le formulaire de contact
		$success = [];// tableu de success
		$success['inscription'] = false; // initialise le success inscription a false
		$success['contact'] = false; // initialise le success contact a false


		if(!empty($_GET)){
			$get = array_map('trim', array_map('strip_tags', $_GET));

			if(isset($get['deconnect']) && $get['deconnect'] == '1'){
				$authModel->logUserOut(); //Permet de déconnecter l'utilisateur
			}
		}

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['form'])){// si le champ form exist
				if($post['form'] == 'register'){//si le champ form vaut 'register'
					// ici le traitement pour le formulaire d'inscription
					if(isset($post['nickname'])){
						if(preg_match('#^.{3,}$#', $post['nickname']) == 0){
							$errors['register'][] = 'Votre pseudo doit comporter 3 caractères minimun';
						}
					}

					if(isset($post['email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['email']) == 0){
							$errors['register'][] = 'Votre email est incorrect';
						}
					}

					if(isset($post['password'])){
                        if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['password']) == 0){
                            $errors['register'][] = 'Le mot de passe doit avoir un chiffre et une majuscule et minimum 8 caractères';
                        }
                    }

                    if($post['password'] != $post['passwordOk']){
                    	$errors['register'][] = 'Les mots de passe ne correspondent pas';
                    }

					if(count($errors['register']) == 0){
						if(!$usersModel->emailExists($post['email'])){
							$data = [
								'nickname' 	=> $post['nickname'],
								'email'		=> $post['email'],
								'password'	=> $authModel->hashPassword($post['password']),
								'role'		=> 'user',
								'confirm' => '0'
							];

							//On passe le tableau $data à la méthode insert() pour enregistrer nos données en base
							if($usersModel->insert($data)){
								$token = md5(uniqid()); // On créer le token

								$data = [
									'email' => $post['email'],
									'date' => date('Y-m-d H:i:s'),
									'date_exp' => date('Y-m-d H:i:s', strtotime('+ 5 min')),
									'token' => $token,
									'idUser' => $usersModel->lastInsertId()
								];

								if($confirmation->insert($data)){// ajout du token en bdd
									//Insertion en base de données effectuée

									// envoie du token par email
									$app = getapp();
									$mail = new \PHPMailer();

									$reponse = $this->generateUrl('default_inscriptionConfirm', ['token' => $token], true);

									$mail->isSMTP();                                     	// Set mailer to use SMTP
									$mail->Host = $app->getConfig('host_mailer'); ;  		// Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               	// Enable SMTP authentication
									$mail->Username = $app->getConfig('user_mailer');       // SMTP username
									$mail->Password = $app->getConfig('pswd_mailer');       // SMTP password
									$mail->SMTPSecure = 'tls';                           	// Enable TLS encryption, `ssl` also accepted
									$mail->Port = 465;                                    	// TCP port to connect to

									$mail->setFrom('confirmation@obar.fr');
									$mail->addAddress($post['email']);     					// Add a recipient

									$mail->isHTML(true);                                  	// Set email format to HTML

									$mail->Subject = 'Here is the subject';
									$mail->Body    = '<a href="'.$reponse.'">Confirmation</a>';
									$mail->AltBody = 'changer d\'ébergeur d\'email';

									if($mail->send()) {
										$success['inscription'] = true;
									} else {
										$errors['register'][] = 'Erreur lors de l\'envoie du token.';
									}
								}
								else{
									$errors['register'][] = 'Erreur lors de la creation du token.';
								}
							}
						}
						else{
							$errors['register'][] = 'L\'email existe déja.';
						}
					}
				}

				if($post['form'] == 'contact'){//si le champ form vaut 'ct'
					// ici le traitement pour le formulaire de contact
					if(isset($post['ct_firstname'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['ct_firstname']) == 0){
							$errors['contact'][] = 'Votre nom doit commencer par une majuscule et comporter minimum 3 caractères';
						}
					}

					if(isset($post['ct_lastname'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['ct_lastname']) == 0){
							$errors['contact'][] = 'Votre prénom doit commencer par une majuscule et comporter minimum 3 caractères';
						}
					}

					if(isset($post['ct_email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['ct_email']) == 0){
							$errors['contact'][] = 'Votre email n\'est pas valide';
						}
					}

					if(isset($post['ct_msg'])){
						if(preg_match('#^.{1,}$#', $post['ct_msg']) == 0){
							$errors['contact'][] = 'Votre message ne doit pas être vide';
						}
					}

					if(count($errors) == 0){
						$messageController->addMessage($post['ct_firstname'], $post['ct_lastname'], $post['ct_email'], $post['ct_msg']);
						$success['contact'] = true;
					}
				}
			} //end if(isset($post['form']
		} //end $_POST


		// On envoi les erreurs en paramètre à l'aide d'un tableau (array)
		$params = ['errors' => $errors, 'success' => $success, 'bars' => $barModel->findAll('id', 'DESC', 3), 'infos' => $presentationModel->find(1)];
		$this->show('default/home', $params);
	}

	public function home_connect()
	{
		$usersModel = new UsersModel();
		$authModel = new AuthModel();
		$barModel = new Bar();
		$presentationModel = new Presentation();

		$params = [];
		$params['bars'] = $barModel->findAll();
		$params['infos'] = $presentationModel->find(1);
		$params['errors'] = [];
		$params['errors']['connexion'] = [];


		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['co_pseudo'])){
				if(preg_match('#^([A-Z]{1}[A-Za-z0-9.-_]{2,15})||([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3})$#', $post['co_pseudo']) == 0){
					$params['errors']['connexion'][] = 'Votre pseudo doit commencer par une majuscule';
				}
			}
			if(isset($post['co_pswd'])){
				if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['co_pswd']) == 0){
					$params['errors']['connexion'][] = 'Votre mot de passe doit contenir au moins une majuscule et un chiffre.';
				}
			}

			if(count($params['errors']['connexion']) == 0){
				$idUser = $authModel->isValidLoginInfo($post['co_pseudo'], $post['co_pswd']);

				if($idUser){
					$user = $usersModel->find($idUser);
					if($user['confirm'] == 1){
						$authModel->logUserIn($user);
					}
					else{
						$params['errors']['connexion'][] = 'Votre compte n\'a pas était validé.';
					}
				}
			}
		}

		$this->show('default/home_connect', $params);
	}

	/*
	* Method de la page de confirmation d'inscription
	*/
	public function inscriptionConfirm($token){
		$authModel = new AuthModel();
		$confirmation = new Confirmation();
		$usersModel = new UsersModel();

		$params = [];

		if($tokenGet = $confirmation->tokenOk($token)){
			// supression du token
			$data = [
				'confirm' => '1'
			];
			if($usersModel->update($data, $tokenGet['idUser'])){
				if($confirmation->delete($tokenGet['id'])){
					$params['success'] = true;
				}
			}
		}
		else{
			$params['errors'][] = 'Votre confirmation d\'inscription a expiré ou n\'éxiste pas.';
		}

		// resultat d'inscription
		$this->show('default/confirm', $params);
	}
}
?>
