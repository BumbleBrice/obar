<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\barModel; //Permet d'importer la classe BarModel que l'on pourra instancier via new Bar();
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
		/*$this->allowTo(['admin']);*/

		$barModel = new barModel();

		$params = ['bars' => $barModel->findAll('id', 'ASC')];

		$this->show('adminBar/bar_list', $params);
	}

	/**
	 * Page add des bars
	**/
	public function bar_add()
	{
			// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin
			// $this->allowTo(['admin']);

			// On instancie la classe barModel qui étend la classe Model
			$barModel = new barModel();

			$errors = [];
			$success = false;

			$maxSize = 500000; // En octet (500Ko)
			$folder = 'assets/img/';
			$imageFinale = 'assets/img/image_defaut.png';

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

							$finalFileName = 'bar-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


							if(move_uploaded_file($fileTemp, $folder.$finalFileName)) {
								// Ici je suis sur que mon image est au bon endroit
								$imageFinale = $folder.$finalFileName;
							}
							else{
								$imageFinale = 'assets/img/image_defaut.png'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
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
				$post = array_map('trim', array_map('strip_tags', $_POST));

				if(isset($post['name'])){
					if(preg_match('#^.{1,}$#', $post['name']) == 0){
						$errors[] = 'error name';
					}
				}

				if(isset($post['picture'])){
					if(preg_match('#^.{1,}$#', $post['picture']) == 0){
						$errors[] = 'error picture';
					}
				}

				if(isset($post['content'])){
					if(preg_match('#^.{1,}$#', $post['content']) == 0){
						$errors[] = 'error content';
					}
				}

				if(isset($post['phone'])){
					if(preg_match('#^.{1,}$#', $post['phone']) == 0){
						$errors[] = 'error phone';
					}
				}

				if(isset($post['address'])){
					if(preg_match('#^.{1,}$#', $post['address']) == 0){
						$errors[] = 'error address';
					}
				}

				if(isset($post['x'])){
					if(preg_match('#^[0-9.]{1,}$#', $post['x']) == 0){
						$errors[] = 'error x';
					}
				}

				if(isset($post['y'])){
					if(preg_match('#^[0-9.]{1,}$#', $post['y']) == 0){
						$errors[] = 'error y';
					}
				}

				if(!isset($post['x']) || !isset($post['y'])){
					$errors[] = 'vous n\'avez pas placer de point pour votre bar';
				}

				if(isset($post['scheduleOpen'])){
					if(preg_match('#^[0-9:]{1,}$#', $post['scheduleOpen']) == 0){
						$errors[] = 'error open';
					}
				}

				if(isset($post['scheduleClose'])){
					if(preg_match('#^[0-9:]{1,}$#', $post['scheduleClose']) == 0){
						$errors[] = 'error close';
					}
				}

				$schedule = '';

				if(isset($post['dayLundi']) && $post['dayLundi'] == 'lundi'){
					$schedule .= 'Lundi, ';
				}
				if(isset($post['dayMardi']) && $post['dayMardi'] == 'mardi'){
					$schedule .= 'Mardi, ';
				}
				if(isset($post['dayMercredi']) && $post['dayMercredi'] == 'mercredi'){
					$schedule .= 'Mercredi, ';
				}
				if(isset($post['dayJeudi']) && $post['dayJeudi'] == 'jeudi'){
					$schedule .= 'Jeudi, ';
				}
				if(isset($post['dayVendredi']) && $post['dayVendredi'] == 'vendredi'){
					$schedule .= 'Vendredi, ';
				}
				if(isset($post['daySamedi']) && $post['daySamedi'] == 'samedi'){
					$schedule .= 'Samedi, ';
				}
				if(isset($post['dayDimanche']) && $post['dayDimanche'] == 'dimanche'){
					$schedule .= 'Dimanche, ';
				}

				if(empty($schedule)){
					$errors[] = 'error schedule';
				}
				else{
					$schedule = substr($schedule, 0, -2);
				}

				if (count($errors) == 0) {
					// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

					// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
					$data = [
						// La clé du tableau correspond au nom de la colonne SQL
						'name' => $post['name'],
						'picture' => $imageFinale,
						'description' => $post['content'],
						'phone' => $post['phone'],
						'adress' => $post['address'],
						'schedule' => $schedule,
						'open' => $post['scheduleOpen'] . ':00',
						'close' => $post['scheduleClose'] . ':00',
						'x' => $post['x'],
						'y' => $post['y'],
						'google_url' => 'https://www.google.fr/maps/place/'.$post['address'].'/',
						'date' => date('Y-m-d H:i:s')
					];

					// On passe le tableau $data à la méthode insert() pur enregistrer nos données en bdd
					if ($barModel->insert($data)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success , 'maxSize' => $maxSize];

		$this->show('adminBar/bar_add', $params);
	}

	/**
	 * Page edit des bars
	**/
	public function bar_edit($id)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			// On instancie la classe UsersModel qui étend la classe Model
			$barModel = new barModel();

			$post = [];
			$errors = [];
			$success = false;

			$maxSize = 500000; // En octet (500Ko)
			$folder = 'assets/img/';

			$bar = $barModel->find($id);

			$bar_name = $bar['name'];
			$bar_picture = $bar['picture'];
			$bar_description = $bar['description'];
			$bar_phone = $bar['phone'];
			$bar_adress = $bar['adress'];
			$bar_schedule = $bar['schedule'];
			$bar_x = $bar['x'];
			$bar_y = $bar['y'];
			$bar_open = $bar['open'];
			$bar_close = $bar['close'];

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

							$finalFileName = 'bar-'.time().$fileExtension; // Le nom du fichier sera donc : user-1463058435.jpg (time() retourne un timestamp à la seconde). Cela permet de sécuriser l'upload de fichier


							if(move_uploaded_file($fileTemp, $folder.$finalFileName)) {
								// Ici je suis sur que mon image est au bon endroit
								$bar_picture = $folder.$finalFileName;
							}
							else{
								$bar_picture = 'assets/img/image_defaut.png'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
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

				if(isset($post['name'])){
					if(preg_match('#^.{1,}$#', $post['name']) == 0 && !empty($post['name'])){
						$errors[] = 'error name';
					}
					else{
						$bar_name = $post['name'];
					}
				}

				if(isset($post['content'])){
					if(preg_match('#^.{1,}$#', $post['content']) == 0 && !empty($post['content'])){
						$errors[] = 'error content';
					}
					else{
						$bar_description = $post['content'];
					}
				}

				if(isset($post['phone'])){
					if(preg_match('#^.{1,}$#', $post['phone']) == 0 && !empty($post['phone'])){
						$errors[] = 'error phone';
					}
					else{
						$bar_phone = $post['phone'];
					}
				}

				if(isset($post['address'])){
					if(preg_match('#^.{1,}$#', $post['address']) == 0 && !empty($post['address'])){
						$errors[] = 'error address';
					}
					else{
						$bar_adress = $post['address'];
					}
				}

				if(isset($post['x'])){
					if(preg_match('#^[0-9]{1,}$#', $post['x']) == 0 && !empty($post['x'])){
						$errors[] = 'error x';
					}
					else{
						$bar_x = $post['x'];
					}
				}

				if(isset($post['y'])){
					if(preg_match('#^[0-9]{1,}$#', $post['y']) == 0  && !empty($post['y'])){
						$errors[] = 'error y';
					}
					else{
						$bar_y = $post['y'];
					}
				}

				if(isset($post['scheduleOpen'])){
					if(preg_match('#^[0-9:]{1,}$#', $post['scheduleOpen']) == 0 && !empty($post['scheduleOpen'])){
						$errors[] = 'error open';
					}
					else{
						$bar_open = $post['scheduleOpen'];
					}
				}

				if(isset($post['scheduleClose'])){
					if(preg_match('#^[0-9:]{1,}$#', $post['scheduleClose']) == 0 && !empty($post['scheduleClose'])){
						$errors[] = 'error close';
					}
					else{
						$bar_close = $post['scheduleClose'];
					}
				}

				$schedule = '';

				if(isset($post['dayLundi']) && $post['dayLundi'] == 'lundi'){
					$schedule .= 'Lundi, ';
				}
				if(isset($post['dayMardi']) && $post['dayMardi'] == 'mardi'){
					$schedule .= 'Mardi, ';
				}
				if(isset($post['dayMercredi']) && $post['dayMercredi'] == 'mercredi'){
					$schedule .= 'Mercredi, ';
				}
				if(isset($post['dayJeudi']) && $post['dayJeudi'] == 'jeudi'){
					$schedule .= 'Jeudi, ';
				}
				if(isset($post['dayVendredi']) && $post['dayVendredi'] == 'vendredi'){
					$schedule .= 'Vendredi, ';
				}
				if(isset($post['daySamedi']) && $post['daySamedi'] == 'samedi'){
					$schedule .= 'Samedi, ';
				}
				if(isset($post['dayDimanche']) && $post['dayDimanche'] == 'dimanche'){
					$schedule .= 'Dimanche, ';
				}

				if(!empty($schedule)){
					$bar_schedule = substr($schedule, 0, -2);
				}

				if (count($errors) == 0) {
					// Ici il n'y a aucune erreurs, on peut donc enregistrer en base de donnée

					// On utilise la méthode insert() qui permet d'insérer des données en base de donnée
					$data = [
						// La clé du tableau correspond au nom de la colonne SQL
						'name' => $bar_name,
						'picture' => $bar_picture,
						'description' => $bar_description,
						'phone' => $bar_phone,
						'adress' => $bar_adress,
						'schedule' => $bar_schedule,
						'x' => $bar_x,
						'y' => $bar_y,
						'open' => $bar_open,
						'close' => $bar_close,

					];

					// On passe le tableau $data à la méthode update() pour mofifier nos données en bdd
					if ($barModel->update($data, $id)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}

			// On envoie les erreurs en paramètre à l'aide d'un tableau (array)
			$params = ['errors' => $errors, 'success' => $success, 'bar' => $barModel->find($id), 'maxSize' => $maxSize];

		$this->show('adminBar/bar_edit', $params);
	}

	/**
	 * Page delete des bars
	**/
	public function bar_delete($id, $delBar)
	{
		// On limite l'accé à la page aux utilisateurs authentifiés et à ceux dont le rôle est admin ou éditor
			/*$this->allowTo(['admin']);*/
			$barModel = new barModel();
			$bar = $barModel->find($id);

			// On vérifie que le paramètre GET soit ok et que la valeur soit bien Oui
			// Si tout est bon, l'utilisateur a donc comfirmer la suppression
			if (isset($delBar) && $delBar == 'Oui') {

				if ($barModel->delete($id)) {
					// Ici on a supprimer l'article
					$this->redirectToRoute('admin_bar_list');
				}

			}

		$this->show('adminBar/bar_delete', ['bar' => $bar]);
	}

}
