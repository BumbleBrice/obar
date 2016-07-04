<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as UsersModel;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;


use \finfo;


class UsersController extends Controller
{
	public function users(){

		$this->allowTo(['admin']);

		$usersModel = new UsersModel();

		$params = [];

		$params['users'] = $usersModel->findAll('id', 'ASC');

		$this->show('adminUsers/users', $params);
	}


	public function user_edit($id){
			// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			$this->allowTo(['admin']);

			// On instancie la classe UsersModel qui étend la classe Model
			$usersModel = new UsersModel();

			$post = [];
			$errors = [];
			$success = false;

			$maxSize = 500000; // En octet (500Ko)
			$folder = 'assets/img/';

			$user = $usersModel->find($id);

			$user_nickname = $user['nickname'];
			$user_firstname = $user['firstname'];
			$user_lastname = $user['lastname'];
			$user_email = $user['email'];
			$user_picture = $user['picture'];
			$user_role = $user['role'];
			$user_password = $user['password'];
			$auth = new AuthModel();

			if(!empty($_FILES)){
				if(isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
					if($_FILES['picture']['size'] < $maxSize){
						$fileName = $_FILES['picture']['name']; // Nom de mon image
						$fileTemp = $_FILES['picture']['tmp_name']; // Image temporaire

						$file = new finfo(); // Classe FileInfo
						$mimeType = $file->file($_FILES['picture']['tmp_name'], FILEINFO_MIME_TYPE); // Retourne le VRAI mimeType
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

							$finalFileName = 'user-'.time().'.'.$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


							if(move_uploaded_file($fileTemp, $folder.$finalFileName)) {
								// Ici je suis sur que mon image est au bon endroit
								$user_picture = 'img/'.$finalFileName;
							}
							else{
								$user_picture = 'img/defaut_profil.jpg'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
							}
						}
						else{
							$errors[] = 'Le mime type est interdit';
						}
					}
					else{
						$errors[] = 'L\'image est trop lourde';
					}
				}
			}

			if(!empty($_POST)){
				foreach ($_POST as $key => $value) {
					$post[$key] = trim(strip_tags($value));
				}

				if(isset($post['nickname'])){
					if(preg_match('#^.{1,}$#', $post['nickname']) == 0){
						$errors[] = 'error nickname';
					}
					else{
						$user_nickname = $post['nickname'];
					}
				}

				if(isset($post['firstname'])){
					if(preg_match('#^.{1,}$#', $post['firstname']) == 0){
						$errors[] = 'error firstname';
					}
					else{
						$user_firstname = $post['firstname'];
					}
				}

				if(isset($post['lastname'])){
					if(preg_match('#^.{1,}$#', $post['lastname']) == 0){
						$errors[] = 'error lastname';
					}
					else{
						$user_lastname = $post['lastname'];
					}
				}

				if(isset($post['email'])){
					if(preg_match('#^.{1,}$#', $post['email']) == 0){
						$errors[] = 'error email';
					}
					else{
						$user_email = $post['email'];
					}
				}

				if(isset($post['password'])){
					if(empty($post['password'])){
					}
					elseif(preg_match('#^.{1,}$#', $post['password']) == 0){
						var_dump($post['password']);
						$errors[] = 'error password';
					}
					else{
						$user_password = $auth->hashPassword($post['password']);
					}
				}

				if(isset($post['role'])){
					if(preg_match('#^.{1,}$#', $post['role']) == 0){
						$errors[] = 'error role';
					}
					else{
						$user_role = $post['role'];
					}
				}

				if (count($errors) == 0) {
					// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

					// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
					$data = [
						// La clé du tableau correspond au nom de la colonne SQL
						'nickname' => $user_nickname,
						'firstname' => $user_firstname,
						'lastname' => $user_lastname,
						'email' => $user_email,
						'password' => $user_password,
						'role' => $user_role,
						'picture' => $user_picture

					];

					// On passe le tableau $data à la méthode update() pour mofifier nos données en bdd
					if ($usersModel->update($data, $id)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success, 'user' => $usersModel->find($id), 'maxSize' => $maxSize];

		$this->show('adminUsers/user_edit', $params);
	}

	public function user_delete($id, $delUser)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
		$this->allowTo(['admin']);

		$usersModel = new UsersModel();
		$user = $usersModel->find($id);

		// On vérifie que le paramètre GET soit ok et que la valeur soit bien Oui
		// Si tout est bon, l'utilisateur a donc comfirmer la suppression
		if (isset($delUser) && $delUser == 'Oui') {

			if ($usersModel->delete($id)) {
				// Ici on a supprimer l'article
				$this->redirectToRoute('admin_users');
			}
		}

		$this->show('adminUsers/user_delete', ['user' => $user]);
	}

	/**
	 * Page add des utilisateurs
	**/
	public function user_add()
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin
		$this->allowTo(['admin']);

		// On instancie la classe barModel qui étend la classe Model
		$usersModel = new UsersModel();
		$authModel = new AuthModel();

		$errors = [];
		$post = [];
		$success = false;

		$maxSize = 500000; // En octet (500Ko)
		$folder = 'assets/img/';
		$imageFinale = 'img/defaut_profil.jpg';

		if(!empty($_FILES)){
			if(isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK && $_FILES['picture']['size'] < $maxSize) {
				$fileName = $_FILES['picture']['name']; // Nom de mon image
				$fileTemp = $_FILES['picture']['tmp_name']; // Image temporaire

				$file = new finfo(); // Classe FileInfo
				$mimeType = $file->file($_FILES['picture']['tmp_name'], FILEINFO_MIME_TYPE); // Retourne le VRAI mimeType
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

					$finalFileName = 'user-'.time().'.'.$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


					if(move_uploaded_file($fileTemp, $folder.$finalFileName)) {
						// Ici je suis sur que mon image est au bon endroit
						$imageFinale = 'img/'.$finalFileName;
					}
					else{
						$imageFinale = 'img/defaut_profil.jpg'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
					}
				}
				else{
					$errors[] = 'Le mime type est interdit';
				}
			}
			else{
				$errors[] = 'L\'image est trop lourde';
			}
		}

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['nickname'])){
				if(preg_match('#^.{1,}$#', $post['nickname']) == 0){
					$errors[] = 'error nickname';
				}
			}

			if(isset($post['firstname'])){
				if(preg_match('#^.{1,}$#', $post['firstname']) == 0){
					$errors[] = 'error firstname';
				}
			}

			if(isset($post['lastname'])){
				if(preg_match('#^.{1,}$#', $post['lastname']) == 0){
					$errors[] = 'error lastname';
				}
			}

			if(isset($post['email'])){
				if(preg_match('#^.{1,}$#', $post['email']) == 0){
					$errors[] = 'error email';
				}
			}

			if(isset($post['password'])){
				if(preg_match('#^.{1,}$#', $post['password']) == 0){
					$errors[] = 'error password';
				}
			}

			if(isset($post['role'])){
				if(preg_match('#^.{1,}$#', $post['role']) == 0){
					$errors[] = 'error role';
				}
			}

			if (count($errors) == 0) {
				// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

				// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
				$data = [
					// La clé du tableau correspond au nom de la colonne SQL
					'nickname' => $post['nickname'],
					'firstname' => $post['firstname'],
					'lastname' => $post['lastname'],
					'email' => $post['email'],
					'password'	=> $authModel->hashPassword($post['password']),
					'role' => $post['role'],
					'picture' => $imageFinale
				];

				// On passe le tableau $data à la méthode insert() pur enregistrer nos données en bdd
				if ($usersModel->insert($data)) {

					// Ici l'insertion en base est effectuée
					$success = true;
				}
			}
		}

		// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
		$params = ['errors' => $errors, 'success' => $success , 'maxSize' => $maxSize, 'post' => $post];

		$this->show('adminUsers/user_add', $params);
	}
}
