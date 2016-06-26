<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel;


class UsersController extends Controller
{
	public function users(){
		$this->show('adminUsers/users');
	}
}
