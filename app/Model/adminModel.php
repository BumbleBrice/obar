<?php

namespace Model;

class adminModel extends \W\model\Model
{
	/*
		Le framework W déduit automatiquement le nom de la table de données en fonction du nom du modèle; Par exemple :
			- BlogModel => blog
			- Blogutilisateurs => blog_utilisateurs
	*/	

	public function __construct() {
	    $app = getApp();
	    // Définit la table en fonction de la config
	    $this->setTable($app->getConfig('bar_table'));
	    $this->dbh = ConnectionModel::getDbh();
	}

}