<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel as UsersModel; //Permet d'importer la classe UsersModel que l'on pourra instancier via new UsersModel();
use \W\Security\AuthentificationModel as AuthModel; //Permet d'importer la classe AuthentificationModel pour hacher le password

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$errors = [];

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['form'])){// si le champ form exist
				if($post['form'] == 'co'){//si le champ form vaut 'co'
					// ici le traitement pour le formulaire de connexion
					if(isset($post['co_pseudo'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{2,15}$#', $post['co_pseudo']) == 0){
							$errors[] = 'Erreur pseudo co';
						}
					}
					if(isset($post['co_pswd'])){
						var_dump(preg_match('#([A-Z]{1}||[a-z]{1}||[0-9]{1}){8,20}#', $post['co_pswd']));//majuscule et chiffre
						if(preg_match('#([A-Z]{1}&[a-z]{1}&[0-9]{1}){8,}#', $post['co_pswd']) == 0){
							$errors[] = 'Votre mot de passe doit contenir au moins une majuscule et un chiffre.';
						}
					}

					if(count($errors) == 0){
						// connexion
						//On instancie les classes UsersModel et AuthModel
						$usersModel = new UsersModel();
						$authModel = new AuthModel();

						// La méthode isValidLoginInfo() retourne un utilisateur si celui-ci existe et que le couple identifiant /mdp existe
						//$idUser contient l'id  de mon utilisateur
						$idUser = $authModel->isValidLoginInfo($post['co_pseudo'], $post['co_pswd']);

						if($idUser){
							//On apelle la méthode find() qui permet de retourner les résultats en fonction d'un ID
							$user = $usersModel->find($idUser);

							//La méthode logUserIn() permet de connecter un utilisateur
							$authModel->logUserIn($user);
							//$myUser = $authModel->getLoggedUser(); //Permet de récupérer les infos de sessions
						}
					}
				}

				if($post['form'] == 'nl'){//si le champ form vaut 'nl'
					// ici le traitement pour le formulaire de newsletter
					if(isset($post['nl_email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['nl_email']) == 0){
							$errors[] = 'Erreur email nl';
						}
					}

					if(count($errors) == 0){
						// Newsletter
						echo 'nl';
					}
				}

				if($post['form'] == 'isc'){//si le champ form vaux 'isc'
					// ici le traitement pour le formulaire d'inscription
				}
				
				if($post['form'] == 'ct'){//si le champ form vaux 'ct'
					// ici le traitement pour le formulaire de contact
				}
			}
		}

		$this->show('default/home');
	}
}
?>
