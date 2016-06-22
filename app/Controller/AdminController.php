<?php

namespace Controller;

use \W\Controller\Controller;

use \W\Security\AuthentificationModel as AuthModel;

class AdminController extends Controller
{

	/**
	 * Page d'accueil admin
	**/
	public function home()
	{

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			// si le champ form exist
				
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                         PRESENTATION                        */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
			
			if($post['form'] == 'presentation'){//si le champ form vaux 'formulaire_1'
				// ici le trétement pour formulaire_1
				if(isset($post['teste'])){
					echo 'test formulaire 1'.$post['teste'];
				}
			}
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                        LISTE DES BARS                       */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

			if($post['form'] == 'bar_list'){//si le champ form vaux 'formulaire_2'
				// ici le trétement pour formulaire_2
				if(isset($post['teste'])){
					echo 'test formulaire 1'.$post['teste'];
				}
			}

		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                       AJOUTER DES BARS                      */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
			if($post['form'] == 'bar_add'){//si le champ form vaux 'formulaire_2'
				// ici le trétement pour formulaire_2
				if(isset($post['teste'])){
					echo 'test formulaire 1'.$post['teste'];
				}
			}

		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                       CONTACT / MESSAGE                     */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

			if($post['form'] == 'contact'){//si le champ form vaux 'formulaire_2'
				// ici le trétement pour formulaire_2
				if(isset($post['teste'])){
					echo 'test formulaire 1'.$post['teste'];
				}
			}

		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                         UTILISATEURS                        */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
			if($post['form'] == 'users'){//si le champ form vaux 'formulaire_2'
				// ici le trétement pour formulaire_2
				if(isset($post['teste'])){
					echo 'test formulaire 1'.$post['teste'];
				}
			}


		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                          NEWSLETTER                         */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
			if($post['form'] == 'news_letter'){//si le champ form vaux 'formulaire_2'
				// ici le trétement pour formulaire_2
				if(isset($post['teste'])){
					echo 'test formulaire 1'.$post['teste'];
				}
			}
		}/* fin if(!empty($_POST)).... */
		$this->show('admin/home_admin');
	} /* fin function home()*/
} 