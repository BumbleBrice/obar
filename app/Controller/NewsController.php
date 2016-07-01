<?php

namespace Controller;

use \W\Controller\Controller;
use \model\NewsModel as NewsModel;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;

class NewsController extends Controller
{
	
	/**
	 * Page d'accueil news
	**/
	public function news()
	{
		$this->allowTo(['admin']);

		$newsModel = new NewsModel();

		$params = [];
		
		$params['news3'] = $newsModel->findAll('id', 'DESC', 3);
		$params['news'] = $newsModel->findAll('id', 'DESC', 1500, 3);


			
		$this->show('adminNews/news', $params);
	} /*Fin de la fonction news*/

	public function news_add()
	{
			// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin
			$this->allowTo(['admin']);

			// On instancie la classe newsModel qui étend la classe Model
			$newsModel = new newsModel();

			$errors = [];
			$success = false;

			if(!empty($_POST)){
				$post = array_map('trim', array_map('strip_tags', $_POST));

				if(isset($post['what'])){
					if(preg_match('#^.{1,}$#', $post['what']) == 0){
						$errors[] = 'error name';
					}
				}

				if(isset($post['bar'])){
					if(preg_match('#^.{1,}$#', $post['bar']) == 0){
						$errors[] = 'error quartiers';
					}
				}

				if(isset($post['msg'])){
					if(preg_match('#^.{1,}$#', $post['msg']) == 0){
						$errors[] = 'error picture';
					}
				}

				if (count($errors) == 0) {
					// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

					// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
					$data = [
						// La clé du tableau correspond au nom de la colonne SQL
						'what' => $post['what'],
						'bar'  => $post['bar'],
						'msg'  => $post['msg'],
					];

					// On passe le tableau $data à la méthode insert() pur enregistrer nos données en bdd
					if ($newsModel->insert($data)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success];

		$this->show('adminNews/news_add', $params);
	}
}