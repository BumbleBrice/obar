<?php

namespace Controller;

use \W\Controller\Controller;

use \W\Security\AuthentificationModel as AuthModel;

class AdminController extends Controller
{

	/**
	 * Page d'accueil admin
	**/
	public function home($)
	{
		/*$this->allowTo(['admin']);*/

		$adminModel = new adminModel();

		// tableau params vide ou l'on peut rajouter des clés pour chaque section
		$params = [];

		// Listes des bars
		$params['bars'] = $adminModel->findAll('id', 'ASC');

		// Ajouter les bars
		$post = [];
		$errors = [];
		$success = false;
		$maxSize = 50000; // En octet
		$folder = 'assets/img/';

		if (!empty($_FILES)) {

			if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK && $_FILES['image']['size'] < $maxSize) {

				$fileName = $_FILES['image']['name']; // Nom de mon image
				$fileTemp = $_FILES['image']['tmp_name']; // Image temporaire

				$file = new finfo(); // Classe FileInfo
				$mimeType = $file->file($_FILES['image']['tmp_name'], FILEINFO_MIME_TYPE); // Retourne le VRAI mimeType
				$mimeTypeAllowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']; // Les mime types autorisés

				// Permet de vérifier que le mime type est bien autorisé
				if (in_array($mimeType, $mimeTypeAllowed)) {
					/*
					 * explode() permet de séparer une chaine de caractère en un tableau
					 * Ici, on aura donc : 
					 * 		$newFileName = array(
					 			0 => 'nom-de-mon-fichier', 
					 			1 => 'jpg'
							);
					 */
					$newFileName = explode('.', $fileName);
					$fileExtension = end($newFileName); // Récupère l'extension du fichier

					$finalFileName = 'user-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


					if (move_uploaded_file($fileTemp, $folder.$finalFileName)) {
						// Ici je suis sur que mon image est au bon endroit
						$imageFinale = $folder.$finalFileName;
					}

					else {
						$imageFinale = 'assets/img/image_defaut.png'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
					}
				}

				else {
					$errors[] = 'Le mime type est interdit';
				}
			}

			else {
				$errors[] = 'Erreur image';
			}

		}

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			if (strlen($post['titre']) < 5 ) {
				$errors[] = 'Le titre doit comporter plus de 5 caractères';
			}

			if (strlen($post['contenu']) < 20 ) {
				$errors[] = 'Le contenu de l\'article doit comporter plus de 20 caractères';
			}

			if (count($errors) == 0) {
				// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

				// On instancie la classe UsersModel qui étend la classe Model
				$blogModel = new BlogModel();

				// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
				$data = [
					// La clé du tableau correspond au nom de la colonne SQL
					'titre' => $post['titre'],
					'contenu' => $post['contenu'],
					'image' => $imageFinale,
				];

				// On passe le tableau $data à la méthode insert() pur enregistrer nos données en bdd
				if ($blogModel->insert($data)) {

					// Ici l'insertion en base est effectuée
					$success = true;
				}
			}

		}

		// Modifier les bars

		$post = [];
		$errors = [];
		$success = false;
		$maxSize = 50000; // En octet
		$folder = 'assets/img/';

		if (!empty($_FILES)) {

			if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK && $_FILES['image']['size'] < $maxSize) {

				$fileName = $_FILES['image']['name']; // Nom de mon image
				$fileTemp = $_FILES['image']['tmp_name']; // Image temporaire

				$file = new finfo(); // Classe FileInfo
				$mimeType = $file->file($_FILES['image']['tmp_name'], FILEINFO_MIME_TYPE); // Retourne le VRAI mimeType
				$mimeTypeAllowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']; // Les mime types autorisés

				// Permet de vérifier que le mime type est bien autorisé
				if (in_array($mimeType, $mimeTypeAllowed)) {
					/*
					 * explode() permet de séparer une chaine de caractère en un tableau
					 * Ici, on aura donc : 
					 * 		$newFileName = array(
					 			0 => 'nom-de-mon-fichier', 
					 			1 => 'jpg'
							);
					 */
					$newFileName = explode('.', $fileName);
					$fileExtension = end($newFileName); // Récupère l'extension du fichier

					$finalFileName = 'user-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


					if (move_uploaded_file($fileTemp, $folder.$finalFileName)) {
						// Ici je suis sur que mon image est au bon endroit
						$imageFinale = $folder.$finalFileName;
					}

					else {
						$imageFinale = 'assets/img/image_defaut.png'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
					}
				}

				else {
					$errors[] = 'Le mime type est interdit';
				}
			}

			else {
				$errors[] = 'L\'image est trop lourde';
			}

		}

		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$idBar = $_POST['id'];
			if(!is_numeric($idBar)) {
				$idBar = 1;
			}
		}

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			if (strlen($post['titre']) < 5 ) {
				$errors[] = 'Le titre doit comporter plus de 5 caractères';
			}

			if (strlen($post['contenu']) < 20 ) {
				$errors[] = 'Le contenu du bar doit comporter plus de 20 caractères';
			}

			if (count($errors) == 0) {
				// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

				// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
				$data = [
					// La clé du tableau correspond au nom de la colonne SQL
					'titre' => $post['titre'],
					'contenu' => $post['contenu'],
					'image' => $imageFinale,
				];

				// On passe le tableau $data à la méthode update() pour mofifier nos données en bdd
				if ($adminModel->update($data, $id)) {

					// Ici l'insertion en base est effectuée
					$success = true;
				}
			}
		}

		$params['bar'] = $adminModel->find($id);


		// Supprimer les bars
		

		$params['errors'] = $errors;
		$params['success'] = $success;

		$this->show('admin/home_admin', $params);
	} /* fin function home()*/
} 