<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as UsersModel;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;


class UsersController extends Controller
{
	public function users(){
		$usersModel = new UsersModel();

		$params = [];

		$params['users'] = $usersModel->findAll('id', 'ASC');

		$this->show('adminUsers/users', $params);
	}
}
