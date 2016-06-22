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
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                         PRESENTATION                        */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */



		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                            CARTE                            */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */



		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                        LISTE DES BARS                       */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */



		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                       AJOUTER DES BARS                      */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */



		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                       CONTACT / MESSAGE                     */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */



		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                         UTILISATEURS                        */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */



		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
		/*                          NEWSLETTER                         */
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */




		$this->show('admin/home_admin');
	}
}