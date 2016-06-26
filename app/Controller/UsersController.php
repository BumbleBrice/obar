<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel;


class UsersController extends Controller
{
	public function users(){
		$usersModel = new UsersModel();

		$params = [];

		$params['users'] = $usersModel->findAll('id', 'ASC');

		$this->show('adminUsers/users', $params);
	}
}
