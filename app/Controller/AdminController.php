<?php

namespace Controller;

use \W\Controller\Controller;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\MessageController as MessageControl;

class AdminController extends Controller
{

	/**
	 * Page d'accueil admin
	**/
	public function home()
	{
		$messageControl = new MessageControl();

		$params = [];

		$params['pres'] = $messageControl->getMessage();

		$this->show('adminHome/home_admin', $params);
	} /* fin function home()*/
}