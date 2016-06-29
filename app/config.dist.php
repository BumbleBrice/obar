<?php

$w_config = [
   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
    'db_pass' => '',								//mot de passe de la bdd
    'db_name' => 'obar',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
	'security_id_property' => 'id',					//nom de la colonne pour la clef primaire
	'security_username_property' => 'username',		//nom de la colonne pour le "pseudo"
	'security_email_property' => 'email',			//nom de la colonne pour l'"email"
	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
	'security_role_property' => 'role',				//nom de la colonne pour le "role"

	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion

	// configuration globale
	'site_name'	=> 'Ô bar', 								// contiendra le nom du site


	'Newsletter_table' => 'news_letter',
	'bar_table' => 'bars',
	'message_table' => 'contact',
	'presentation_table' => 'obar_desc',

	'token_pswd_table' => 'token_pswd',
	'token_confirm_table' => 'token_confirm',

	'host_mailer' 	=> 'mailtrap.io',
	'user_mailer' 	=> '4bfa7bfbada3f6',
	'pswd_mailer'	=> '41077df70e70b0'

];

require('routes.php');
