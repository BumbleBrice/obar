<?php

namespace Controller;

use \W\Controller\Controller;

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
				if($post['form'] == 'co'){//si le champ form vaux 'co'
					// ici le trétement pour le formulaire de connexion
					if(isset($post['co_pseudo'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{2,15}$#', $post['co_pseudo']) == 0){
							$errors[] = 'Erreur pseudo co';
						}
					}
					if(isset($post['co_pswd'])){
						var_dump(preg_match('#([A-Z]{1}||[a-z]{1}||[0-9]{1}){8,20}#', $post['co_pswd']));
						if(preg_match('#([A-Z]{1}&[a-z]{1}&[0-9]{1}){8,}#', $post['co_pswd']) == 0){
							$errors[] = 'Erreur pswd co';
						}
					}

					if(count($errors) == 0){
						// connexion
						echo 'co';
					}
				}
				if($post['form'] == 'nl'){//si le champ form vaux 'nl'
					// ici le trétement pour le formulaire de newsletter
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
					// ici le trétement pour le formulaire d'inscription
				}
				if($post['form'] == 'ct'){//si le champ form vaux 'ct'
					// ici le trétement pour le formulaire de contact
				}
			}
		}
		
		$this->show('default/home');
	}

}
