<?php

namespace Controller;

use \W\Controller\Controller;
use \model\AdminModel as AdminModel;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;

class AdminController extends Controller
{

	/**
	 * Page d'accueil admin
	**/
	public function home()
	{
		$this->allowTo(['admin']);

		$adminModel = new AdminModel();
		
		$params = [];

		$params['pres'] = $adminModel->find(1);

		$this->show('adminHome/home_admin', $params);
	}

	public function presentation_edit() 
	{
		$this->allowTo(['admin']);

		// On instancie notre AdminModel() permettant d'accéder à la base de données => table "obar_desc"
		$adminModel = new AdminModel();
		// On récupère notre article via la méthode find() à la quelle on passe l'id de l'article
		$pres = $adminModel->find(1);

		$post = [];
		$errors = [];
		$success = false;
		if(!empty($_POST)){
			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			if(strlen($post['description']) < 5){
				$errors[] = 'La description doit comporter au moins 5 caractères';
			}
			

			if(count($errors) === 0){

				$data = [
					'description' 	=> $post['description'],
				];

				if($adminModel->update($data, 1)){
					$success = true;
				}

			}
		}

		$params = ['pres' => $pres, 'errors' => $errors, 'success' => $success];
		$this->show('adminHome/presentation_edit', $params);
	}
}