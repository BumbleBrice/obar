<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel as UsersModel; //Permet d'importer la classe UsersModel que l'on pourra instancier via new UsersModel();
use \W\Security\AuthentificationModel as AuthModel; //Permet d'importer la classe AuthentificationModel pour hacher le password

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		//Instancie les classes
		$usersModel = new UsersModel();
		$authModel = new AuthModel();

		$messageController = new \Controller\MessageController();

		$errors = [];
		$success = false;

		if(!empty($_GET)){
			$get = array_map('trim', array_map('strip_tags', $_GET));
			if(isset($get['deconnect']) && $get['deconnect'] == '1'){
				$authModel->logUserOut(); //Permet de déconnecter l'utilisateur
			}
		}

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['form'])){// si le champ form exist

				if($post['form'] == 'co'){//si le champ form vaut 'co'
					// ici le traitement pour le formulaire de connexion
					if(isset($post['co_pseudo'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{2,15}$#', $post['co_pseudo']) == 0){
							$errors[] = 'Votre pseudo doit commencer par une majuscule';
						}
					}
					if(isset($post['co_pswd'])){
						if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['co_pswd']) == 0){
							$errors[] = 'Votre mot de passe doit contenir au moins une majuscule et un chiffre.';
						}
					}

					if(count($errors) == 0){
						// connexion

						// La méthode isValidLoginInfo() retourne un utilisateur si celui-ci existe et que le couple identifiant /mdp existe
						//$idUser contient l'id  de mon utilisateur
						$idUser = $authModel->isValidLoginInfo($post['co_pseudo'], $post['co_pswd']);

						if($idUser){
							//On apelle la méthode find() qui permet de retourner les résultats en fonction d'un ID
							$user = $usersModel->find($idUser);

							//La méthode logUserIn() permet de connecter un utilisateur
							$authModel->logUserIn($user);
							//$myUser = $authModel->getLoggedUser(); //Permet de récupérer les infos de sessions
						}
					}
				}

				if($post['form'] == 'nl'){//si le champ form vaut 'nl'
					// ici le traitement pour le formulaire de newsletter
					if(isset($post['nl_email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['nl_email']) == 0){
							$errors[] = 'Erreur email nl';
						}
					}

					if(count($errors) == 0){
						// Newsletter
						echo 'nl';
					}
				}

				if($post['form'] == 'register'){//si le champ form vaut 'register'
					// ici le traitement pour le formulaire d'inscription
					if(isset($post['nickname'])){
						if(preg_match('#^.{1,}$#', $post['nickname']) == 0){
							$errors[] = 'erreur nickname';
						}
					}

					if(isset($post['email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['email']) == 0){
							$errors[] = 'erreur contact email';
						}
					}

					if(isset($post['password'])){
                        if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['password']) == 0){
                            $errors[] = 'Votre mot de passe doit être au minimun de 8 caractères et inclure un chiffre et une majuscule';
                        }
                    }

                    if($post['password'] != $post['passwordOk']){
                    	$errors[] = 'Les mots de passe ne correspondent pas';
                    }

					if(count($errors) == 0){
						$data = [
							'nickname' 	=> $post['nickname'],
							'email'		=> $post['email'],
							'password'	=> $authModel->hashPassword($post['password']),
							'role'		=> 'user',
						];
						//On passe le tableau $data à la méthode insert() pour enregistrer nos données en base
						if($usersModel->insert($data)){
							//Insertion en base de données effectuée
							$success = true;
						}
						else{

						}
					}
				}

				if($post['form'] == 'contact'){//si le champ form vaut 'ct'
					// ici le traitement pour le formulaire de contact
					if(isset($post['ct_firstname'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['ct_firstname']) == 0){
							$errors[] = 'Votre nom doit commencer par une majuscule et comporter minimum 3 caractères';
						}
					}

					if(isset($post['ct_lastname'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['ct_lastname']) == 0){
							$errors[] = 'Votre prénom doit commencer par une majuscule et comporter minimum 3 caractères';
						}
					}

					if(isset($post['ct_email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['ct_email']) == 0){
							$errors[] = 'Votre email n\'est pas valide';
						}
					}

					if(isset($post['ct_msg'])){
						if(preg_match('#^.{1,}$#', $post['ct_msg']) == 0){
							$errors[] = 'Votre message ne doit pas être vide';
						}
					}

					if(count($errors) == 0){
						$messageController->addMessage($post['ct_firstname'], $post['ct_lastname'], $post['ct_email'], $post['ct_msg']);
						$success = true;
					}
				}
			} //end if(isset($post['form']
		} //end $_POST

		// On envoi les erreurs en paramètre à l'aide d'un tableau (array)
		$params = ['errors' => $errors, 'success' => $success];
		$this->show('default/home', $params);
	}
}
?>
