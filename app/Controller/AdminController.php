<?php

namespace Controller;

use \W\Controller\Controller;

use \W\Security\AuthentificationModel as AuthModel;

class AdminController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('admin/home_admin');
	}

}