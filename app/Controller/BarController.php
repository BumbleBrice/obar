<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\barModel as bar; //Permet d'importer la classe BarModel que l'on pourra instancier via new Bar();
use \W\Model\barModel as barModel; //Permet d'importer la classe UsersModel que l'on pourra instancier via new UsersModel();
use \W\Security\AuthentificationModel as AuthModel; //Permet d'importer la classe AuthentificationModel pour hacher le password
use \finfo;

class BarController extends Controller
{

	/**
	 * Page liste des bars
	**/
	public function bar_list()
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin
		$this->allowTo(['admin']);

		$barModel = new barModel();

		$params = ['bar' => $barModel->findAll('id', 'ASC')];

		$this->show('adminBar/bar_list', $params);
	}

	/**
	 * Page add des bars
	**/
	public function bar_add()
	{
			// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin
			$this->allowTo(['admin']);

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

						$finalFileName = 'bar-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


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

				if (strlen($post['name']) < 2 ) {
					$errors[] = 'Le nom du bar doit comporter plus de 2 caractères';
				}

				if (strlen($post['content']) < 10 ) {
					$errors[] = 'Le contenu du bar doit comporter plus de 10 caractères';
				}

				if (strlen($_POST['phone']) == 10) {
					$errors[] = 'Le téléphone doit être composé de 10 chiffres';
				}

				if (strlen($post['address']) < 2 ) {
					$errors[] = 'L\'adress du bar doit comporter plus de 2 caractères';
				}

				if (strlen($post['schedule']) < 20 ) {
					$errors[] = 'Les horaires du bar sont incorrectes';
				}

				if (count($errors) == 0) {
					// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

					// On instancie la classe barModel qui étend la classe Model
					$barModel = new barModel();

					// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
					$data = [
						// La clé du tableau correspond au nom de la colonne SQL
						'name' => $post['name'],
						'image' => $imageFinale,
						'content' => $post['content'],
						'phone' => $post['phone'],
						'address' => $post['address'],
						'schedule' => $post['schedule'],
					];

					// On passe le tableau $data à la méthode insert() pur enregistrer nos données en bdd
					if ($barModel->insert($data)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success];

		$this->show('adminBar/bar_add', $params);
	}

	/**
	 * Page edit des bars
	**/
	public function bar_edit()
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			$this->allowTo(['admin', 'editor']);

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

						$finalFileName = 'bar-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


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

				if (strlen($post['name']) < 2 ) {
					$errors[] = 'Le nom du bar doit comporter plus de 2 caractères';
				}

				if (strlen($post['content']) < 10 ) {
					$errors[] = 'Le contenu du bar doit comporter plus de 10 caractères';
				}

				if (strlen($_POST['phone']) == 10) {
					$errors[] = 'Le téléphone doit être composé de 10 chiffres';
				}

				if (strlen($post['address']) < 2 ) {
					$errors[] = 'L\'adress du bar doit comporter plus de 2 caractères';
				}

				if (strlen($post['schedule']) < 20 ) {
					$errors[] = 'Les horaires du bar sont incorrectes';
				}

				if (count($errors) == 0) {
					// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

					// On instancie la classe UsersModel qui étend la classe Model
					$barModel = new barModel();

					// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
					$data = [
						// La clé du tableau correspond au nom de la colonne SQL
						'name' => $post['name'],
						'image' => $imageFinale,
						'content' => $post['content'],
						'phone' => $post['phone'],
						'address' => $post['address'],
						'schedule' => $post['schedule'],
					];

					// On passe le tableau $data à la méthode update() pour mofifier nos données en bdd
					if ($barModel->update($data, $id)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$barModel = new barModel();
			$params = ['errors' => $errors, 'success' => $success, 'bar' => $barModel->find($id)];

		$this->show('adminBar/bar_edit', $params);
	}

	/**
	 * Page delete des bars
	**/
	public function bar_delete()
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			$this->allowTo(['admin']);
			$barModel = new barModel();
			$bar = $barModel->find($id);

			// On vérifie que le paramètre GET soit ok et que la valeur soit bien Oui
			// Si tout est bon, l'utilisateur a donc comfirmer la suppression
			if (!empty($_GET) && isset($_GET['delBar']) && $_GET['delBar'] == 'Oui') {

				if ($barModel->delete($id)) {
					// Ici on a supprimer l'article
					$this->redirectToRoute('adminBar/bar_list');
				}

			}

		$this->show('adminBar/bar_delete', ['bar' => $bar]);
	}

}