<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as UsersModel;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;


class UsersController extends Controller
{
	public function users(){
		$usersModel = new UsersModel();

		$params = [];

		$params['users'] = $usersModel->findAll('id', 'ASC');

		$this->show('adminUsers/users', $params);
	}


	public function user_edit($id){
			// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			// On instancie la classe UsersModel qui étend la classe Model
			$userModel = new UsersModel();

			$post = [];
			$errors = [];
			$success = false;

			$maxSize = 500000; // En octet (500Ko)
			$folder = 'assets/img/';

			$user = $UserModel->find($id);

			$user_name = $user['nickname'];
			$user_picture = $user['firstname'];
			$user_description = $user['lastname'];
			$user_phone = $user['email'];
			$user_adress = $user['password'];

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

						$finalFileName = 'user-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


						if(move_uploaded_file($fileTemp, $folder.$finalFileName)) {
							// Ici je suis sur que mon image est au bon endroit
							$user_picture = $folder.$finalFileName;
						}
						else{
							$user_picture = 'assets/img/image_defaut.png'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
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
				foreach ($_POST as $key => $value) {
					$post[$key] = trim(strip_tags($value));
				}

				if(isset($post['nickname'])){
					if(preg_match('#^.{1,}$#', $post['nickname']) == 0){
						$errors[] = 'error nickname';
					}
					else{
						$user_name = $post['nickname'];
					}
				}

				if(isset($post['firstname'])){
					if(preg_match('#^.{1,}$#', $post['firstname']) == 0){
						$errors[] = 'error firstname';
					}
					else{
						$user_description = $post['firstname'];
					}
				}

				if(isset($post['lastname'])){
					if(preg_match('#^.{1,}$#', $post['lastname']) == 0){
						$errors[] = 'error lastname';
					}
					else{
						$user_phone = $post['lastname'];
					}
				}

				if(isset($post['email'])){
					if(preg_match('#^.{1,}$#', $post['email']) == 0){
						$errors[] = 'error email';
					}
					else{
						$user_adress = $post['email'];
					}
				}

				if(isset($post['password'])){
					if(preg_match('#^.{1,}$#', $post['password']) == 0){
						$errors[] = 'error password';
					}
					else{
						$user_adress = $post['password'];
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

					];

					// On passe le tableau $data à la méthode update() pour mofifier nos données en bdd
					if ($userModel->update($data, $id)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success, 'user' => $userModel->find($id), 'maxSize' => $maxSize];

		$this->show('adminUser/user_edit', $params);
	}

	public function user_delete($id)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			$userModel = new userModel();
			$user = $userModel->find($id);

			// On vérifie que le paramètre GET soit ok et que la valeur soit bien Oui
			// Si tout est bon, l'utilisateur a donc comfirmer la suppression
			if (!empty($_GET) && isset($_GET['delUser']) && $_GET['delUser'] == 'Oui') {

				if ($userModel->delete($id)) {
					// Ici on a supprimer l'article
					$this->redirectToRoute('admin_user_list');
				}

			}

		$this->show('adminUser/user_delete', ['user' => $user]);
	}
}