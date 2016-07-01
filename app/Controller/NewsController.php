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
		$newsModel = new NewsModel();

		$params = [];
		
		$params['news3'] = $newsModel->findAll('id', 'DESC', 3);
		$params['news'] = $newsModel->findAll('id', 'DESC', 1500, 3);


			
		$this->show('adminNews/news', $params);
	} /*Fin de la fonction news*/

	public function news_delete($id, $delNew)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			$newsModel = new NewsModel();
			$new = $newsModel->find($id);

			// On vérifie que le paramètre GET soit ok et que la valeur soit bien Oui
			// Si tout est bon, l'utilisateur a donc comfirmer la suppression
			if (isset($delNew) && $delNew == 'Oui') {

				if ($newsModel->delete($id)) {
					// Ici on a supprimer l'article
					$this->redirectToRoute('admin_news');
				}
			}

		$this->show('adminNews/news_delete', ['new' => $new]);
	}
	public function news_add()
	{
			// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin
			// $this->allowTo(['admin']);

			// On instancie la classe newsModel qui étend la classe Model
			$newsModel = new newsModel();

			$errors = [];
			$success = false;

			if(!empty($_POST)){
				$post = array_map('trim', array_map('strip_tags', $_POST));

				if(isset($post['what'])){
					if(preg_match("#^[A-Z]+[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['what']) == 0){
						$errors[] = 'L\évènement doit commencer par une majuscule et faire entre 3 et 25 caractères';
					}
				}

				if(isset($post['bar'])){
					if(preg_match("#^[A-Z]+[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['bar']) == 0){
						$errors[] = 'Le nom doit commencer par une majuscule et faire entre 3 et 25 caractères';
					}
				}

				if(isset($post['msg'])){
					if(preg_match("#^[A-Z]+[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,50}#", $post['msg']) == 0){
						$errors[] = 'Le message doit commencer par une majuscule et faire entre 3 et 50 caractères';
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


	/**
	 * Page edit des bars
	**/
	public function news_edit($id)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			// On instancie la classe UsersModel qui étend la classe Model
			$newsModel = new newsModel();

			$post = [];
			$errors = [];
			$success = false;

		/*	$newsWhat = $news['what'];
			$newsBar = $news['bar'];
			$newsMsg = $news['msg'];*/
				
			if(!empty($_POST)){
				$post = array_map('trim', array_map('strip_tags', $_POST));

				if(isset($post['what'])){
					if(preg_match("#^[A-Z]+[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['what']) == 0){
						$errors[] = 'L\évènement doit commencer par une majuscule et faire entre 3 et 25 caractères';
					}
				}

				if(isset($post['bar'])){
					if(preg_match("#^[A-Z]+[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['bar']) == 0){
						$errors[] = 'Le nom doit commencer par une majuscule et faire entre 3 et 25 caractères';
					}
				}

				if(isset($post['msg'])){
					if(preg_match("#^[A-Z]+[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,50}#", $post['msg']) == 0){
						$errors[] = 'Le message doit commencer par une majuscule et faire entre 3 et 50 caractères';
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
					if ($newsModel->update($data, $id)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success, 'news' => $newsModel->find($id)];

		$this->show('adminNews/news_edit', $params);
	}





}
