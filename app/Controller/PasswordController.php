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
					if($user = $lostPasswordModel->tokenOk($token)){
						if(count($params['errors']) == 0){
							if($lostPasswordModel->changePassword($user['email'], $auth->hashPassword($post['password']))){
								$params['success'] = true;
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
							$data = [
								'email' => $post['email'],
								'date' => date('Y-m-d H:i:s'),
								'date_exp' => date('Y-m-d H:i:s', strtotime('+ 5 min')),
								'token' => 'azerty'
							];
							if($lostPasswordModel->insert($data)){
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
