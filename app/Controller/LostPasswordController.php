<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\LostPasswordModel; //Permet d'importer la classe BarModel que l'on pourra instancier via new Bar();
use \W\Model\UsersModel;
use \finfo;

class LostPasswordController extends Controller
{

	/**
	 * page lostpassword
	**/
	public function LostPassword($token){
		$lostPasswordModel = new LostPasswordModel();
		$usersModel = new UsersModel();

		$params = [];
		$params['errors'] = [];
		$params['success'] = false;

		if(!empty($token)){
			$params['reset_pswd'] = true;

			if(!empty($_POST)){
				$post = array_map('trim', array_map('strip_tags', $_POST));

				if(isset($post['form'])){
					if($post['form'] == 'lost'){
						if(isset($post['email'])){
							if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['email']) == 0){
								$params['errors'][] = 'Votre email n\'est pas valide.';
							}
						}

						if(count($params['errors']) == 0){
							if($usersModel->emailExists($post['email'])){

								$data = [
									'email' => '',
									'date' => '',
									'date_exp' => '',
									'token' => ''
								];


								$LostPasswordModel->insert($data);
							}
						}

					}
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
						if($lostPasswordModel->tokenOk($token)){
							if(count($params['errors']) == 0){
								if($lostPasswordModel->changePassword($email)){
									$params['success'] = true;
								}
							}
						}
						else{
							$params['errors'][] = 'Le votre demande de réinitialisation a expiré ou n\'éxiste pas.';
						}
					}
				}
			}
		}

		$this->show('default/LostPassword', $params);
	}
}
