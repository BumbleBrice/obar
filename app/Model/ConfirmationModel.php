<?php

namespace Model;
use \W\Model\ConnectionModel;
use \W\Security\AuthentificationModel as Auth;

class ConfirmationModel extends \W\model\Model
{
	public function __construct() {
		$app = getApp();
		// Définit la table en fonction de la config
		$this->setTable($app->getConfig('token_confirm_table'));
		$this->dbh = ConnectionModel::getDbh();
	}

	public function tokenOk($token){
		$bdd = $this->dbh;

		$res = $bdd->prepare('SELECT * FROM token_confirm where token = :token AND date_exp > now()');
		$res->bindValue(':token', $token);

		if($res->execute()){
			if($res->rowCount()){
				return $res->fetch();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}
