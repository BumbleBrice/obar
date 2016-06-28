<?php

namespace Model;
use \W\Model\ConnectionModel;

class LostPasswordModel extends \W\model\Model
{
	public function __construct() {
		$app = getApp();
		// Définit la table en fonction de la config
		$this->setTable($app->getConfig('token_pswd_table'));
		$this->dbh = ConnectionModel::getDbh();
	}

	public function tokenOk($token){
		$bdd = self::dbh;

		$res = $bdd->prepare('SELECT * FROM token_pswd where token = :token AND date_exp < now()');
		$res->bindValue(':token', $token);

		if($res->execute()){
			if($res->rowCount()){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function changePassword($email, $password){
		$bdd = self::dbh;

		$res = $bdd->prepare('UPDATE users SET (password) VALUES (:password) WHERE email = :email');
		$res->bindValue(':email', $email);
		$res->bindValue(':password', $password);

		if($res->execute()){
			return true;
		}
		else{
			return false;
		}
	}
}
