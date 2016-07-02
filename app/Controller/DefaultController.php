<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel as UsersModel; //Permet d'importer la classe UsersModel que l'on pourra instancier via new UsersModel();
use \W\Security\AuthentificationModel as AuthModel; //Permet d'importer la classe AuthentificationModel pour hacher le password
use \Model\BarModel as Bar;
use \Model\NewsModel as News;
use \Model\ConfirmationModel as Confirmation;
use \Model\PresentationModel as Presentation; //Permet d'importer la calsse PresentationModel pour la présentation du site

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		//Instancie les classes
		$confirmation = new Confirmation();
		$usersModel = new UsersModel();
		$authModel = new AuthModel();
		$barModel = new Bar();
		$newsModel = new News();
		$presentationModel = new Presentation();
		$messageController = new \Controller\MessageController();

		if($authModel->getLoggedUser()){
			$this->redirectToRoute('default_home_connect');
		}

		$errors = [];// tableau de tablau d'erreurs
		$errors['connexion'] = [];// tableau d'erreurs pour le formulaire de connexion
		$errors['register'] = [];// tableau d'erreurs pour le formulaire d'inscription
		$errors['contact'] = [];// tableau d'erreurs pour le formulaire de contact

		$success = [];// tableu de success
		$success['inscription'] = false; // initialise le success inscription a false
		$success['contact'] = false; // initialise le success contact a false

		$quartiers = 'aucain';
		$email_inscription = '';

		if(!empty($_GET)){
			$get = array_map('trim', array_map('strip_tags', $_GET));

			if(isset($get['deconnect']) && $get['deconnect'] == '1'){
				$authModel->logUserOut(); //Permet de déconnecter l'utilisateur
			}
			// 'saintpierre','saintpaul','quinconces','meriadeck','gambetta','hoteldeville','saintmichel'
			if(isset($get['quartiers'])){
				if($get['quartiers'] == 'saintpierre'){
					$quartiers = 'saintpierre';
				}
			}

			if(isset($get['quartiers'])){
				if($get['quartiers'] == 'saintpaul'){
					$quartiers = 'saintpaul';
				}
			}
		}

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['form'])){// si le champ form exist
				if($post['form'] == 'register'){//si le champ form vaut 'register'
					// ici le traitement pour le formulaire d'inscription
					if(isset($post['nickname'])){
						if(preg_match('#^.{3,}$#', $post['nickname']) == 0){
							$errors['register'][] = 'Votre pseudo doit comporter 3 caractères minimun';
						}
					}

					if(isset($post['email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['email']) == 0){
							$errors['register'][] = 'Votre email est incorrect';
						}
					}

					if(isset($post['password'])){
                        if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['password']) == 0){
                            $errors['register'][] = 'Le mot de passe doit avoir un chiffre et une majuscule et minimum 8 caractères';
                        }
                    }

                    if($post['password'] != $post['passwordOk']){
                    	$errors['register'][] = 'Les mots de passe ne correspondent pas';
                    }

					if(count($errors['register']) == 0){
						if(!$usersModel->emailExists($post['email'])){
							$data = [
								'nickname' 	=> $post['nickname'],
								'email'		=> $post['email'],
								'password'	=> $authModel->hashPassword($post['password']),
								'role'		=> 'user',
								'confirm' => '0'
							];

							//On passe le tableau $data à la méthode insert() pour enregistrer nos données en base
							if($usersModel->insert($data)){
								$token = md5(uniqid()); // On créer le token

								$iduser = $usersModel->getUserByUsernameOrEmail($post['email'])['id'];

								$data = [
									'email' => $post['email'],
									'date' => date('Y-m-d H:i:s'),
									'date_exp' => date('Y-m-d H:i:s', strtotime('+ 5 min')),
									'token' => $token,
									'idUser' => $iduser
								];

								if($confirmation->insert($data)){// ajout du token en bdd
									//Insertion en base de données effectuée

									// envoie du token par email
									$app = getapp();
									$mail = new \PHPMailer();

									$reponse = $this->generateUrl('default_inscriptionConfirm', ['token' => $token], true);

									$mail->isSMTP();                                     	// Set mailer to use SMTP
									$mail->Host = $app->getConfig('host_mailer'); ;  		// Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               	// Enable SMTP authentication
									$mail->Username = $app->getConfig('user_mailer');       // SMTP username
									$mail->Password = $app->getConfig('pswd_mailer');       // SMTP password
									$mail->SMTPSecure = 'tls';                           	// Enable TLS encryption, `ssl` also accepted
									$mail->Port = 465;                                    	// TCP port to connect to

									$mail->setFrom('confirmation@obar.fr');
									$mail->addAddress($post['email']);     					// Add a recipient

									$mail->isHTML(true);                                  	// Set email format to HTML

									$mail->Subject = 'Here is the subject';
									$mail->Body    = '<a href="'.$reponse.'">Confirmation</a>';
									$mail->AltBody = 'changer d\'ébergeur d\'email';

									if($mail->send()) {
										$success['register'] = true;
										$email_inscription = $post['email'];
									} else {
										$errors['register'][] = 'Erreur lors de l\'envoie du mail de confirmation.';
									}
								}
								else{
									$errors['register'][] = 'Erreur lors de la creation du token.';
								}
							}
						}
						else{
							$errors['register'][] = 'L\'email existe déja.';
						}
					}
				}

				if($post['form'] == 'contact'){//si le champ form vaut 'ct'
					// ici le traitement pour le formulaire de contact
					if(isset($post['ct_firstname'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['ct_firstname']) == 0){
							$errors['contact'][] = 'Votre nom doit commencer par une majuscule et comporter minimum 3 caractères';
						}
					}

					if(isset($post['ct_lastname'])){
						if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['ct_lastname']) == 0){
							$errors['contact'][] = 'Votre prénom doit commencer par une majuscule et comporter minimum 3 caractères';
						}
					}

					if(isset($post['ct_email'])){
						if(preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$#', $post['ct_email']) == 0){
							$errors['contact'][] = 'Votre email n\'est pas valide';
						}
					}

					if(isset($post['ct_msg'])){
						if(preg_match('#^.{1,}$#', $post['ct_msg']) == 0){
							$errors['contact'][] = 'Votre message ne doit pas être vide';
						}
					}

					if(count($errors['contact']) == 0){
						if($messageController->addMessage($post['ct_firstname'], $post['ct_lastname'], $post['ct_email'], $post['ct_msg'])){
							$success['contact'] = true;
						}
						else{
							$errors['contact'][] = 'Erreur lors de l\'envoie du message';
						}
					}
				}
			} //end if(isset($post['form']
		} //end $_POST

		$pointQuartiers = [
			[
				'x' => '45',
				'y' => '52',
				'name' => 'Saint Pierre',
				'quartier' => 'Saint Pierre'
			],
			[
				'x' => '46',
				'y' => '59',
				'name' => 'Saint Paul',
				'quartier' => 'Saint Paul'
			]
		];

	$params = [
		'email_inscription' => $email_inscription,
		'pointQuartiers' => $pointQuartiers,
		'quartiers' => $quartiers,
		'errors' => $errors,
		'success' => $success,
		'bars' => $barModel->findAll(),
		'lastbars' => $newsModel->findAll('id', 'DESC', 3),
		'infos' => $presentationModel->find(1)
    ];
		// On envoi les erreurs en paramètre à l'aide d'un tableau (array)
		$this->show('default/home', $params);
	}

	public function home_connect()
	{
		$usersModel = new UsersModel();
		$authModel = new AuthModel();
		$barModel = new Bar();
		$presentationModel = new Presentation();
		$newsModel = new News();

		$params = [];
		$params['bars'] = $barModel->findAll();
		$params['infos'] = $presentationModel->find(1);
		$params['errors'] = [];
		$params['errors']['connexion'] = [];
		$params['lastbars'] = $newsModel->findAll('id', 'DESC', 3);


		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(isset($post['co_pseudo'])){
				if(preg_match('#^([A-Z]{1}[A-Za-z0-9.-_]{2,15})||([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3})$#', $post['co_pseudo']) == 0){
					$params['errors']['connexion'][] = 'Votre pseudo doit commencer par une majuscule';
				}
			}
			if(isset($post['co_pswd'])){
				if(preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $post['co_pswd']) == 0){
					$params['errors']['connexion'][] = 'Votre mot de passe doit contenir au moins une majuscule et un chiffre.';
				}
			}

			if(count($params['errors']['connexion']) == 0){
				$idUser = $authModel->isValidLoginInfo($post['co_pseudo'], $post['co_pswd']);

				if($idUser){
					$user = $usersModel->find($idUser);
					if($user['confirm'] == 1){
						$authModel->logUserIn($user);
					}
					else{
						$params['errors']['connexion'][] = 'Votre compte n\'a pas était validé.';
					}
				}
			}
		}

		$this->show('default/home_connect', $params);
	}

	/*
	* Method de la page de confirmation d'inscription
	*/
	public function inscriptionConfirm($token){
		$authModel = new AuthModel();
		$confirmation = new Confirmation();
		$usersModel = new UsersModel();

		$params = [];

		if($tokenGet = $confirmation->tokenOk($token)){
			// supression du token
			$data = [
				'confirm' => '1'
			];

			if($usersModel->update($data, $tokenGet['idUser'])){
				if($confirmation->delete($tokenGet['id'])){
					$this->redirectToRoute('default_home');
				}
			}
		}
		else{
			$params['errors'][] = 'Votre confirmation d\'inscription a expiré ou n\'éxiste pas.';
		}

		// resultat d'inscription
		$this->show('default/confirm', $params);
	}

	public function profil_membre($id)
	{
		// On limite l'accès à la page uniquement aux utilisateurs identifiés et à ceux dont le rôle est admin, soit editor
		$this->allowTo(['user', 'admin']);

		$usersModel = new UsersModel();
		$authModel = new AuthModel();



		$getUser = $this->getUser();

		$post = [];
		$errors = [];
		$success = false;

		$maxSize = 500000; // En octet (500Ko)
		$folder = 'assets/img/';

		$user = $usersModel->find($getUser['id']);

		$user_nickname = $user['nickname'];
		$user_firstname = $user['firstname'];
		$user_lastname = $user['lastname'];
		$user_email = $user['email'];
		$user_password = $user['password'];
		$user_role = $user['role'];
		$user_password = $user['password'];

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
							$user_picture = 'assets/img/avatar_defaut.png'; // Permet d'avoir une image par défaut si l'upload ne s'est pas bien déroulé
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
						$user_nickname = $post['nickname'];
					}
				}

				if(isset($post['firstname'])){
					if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['firstname']) == 0){
						$errors[] = 'Votre prénom est incorrect';
					}
					else{
						$user_firstname = $post['firstname'];
					}
				}

				if(isset($post['lastname'])){
					if(preg_match('#^[A-Z]{1}[A-Za-z0-9.-_]{3,20}$#', $post['lastname']) == 0){
						$errors[] = 'Votre nom est incorrect';
					}
					else{
						$user_lastname = $post['lastname'];
					}
				}

				if(isset($post['email'])){
					if(preg_match('#^.{1,}$#', $post['email']) == 0){
						$errors[] = 'Votre email est incorrect';
					}
					else{
						$user_email = $post['email'];
					}
				}

				if(isset($post['picture'])){
					if(preg_match('#^.{1,}$#', $post['picture']) == 0){
						$errors[] = 'Veuillez insérer une image';
					}
					else{
						$user_picture = $post['picture'];
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
						'picture' => $user_picture

					];

					// On passe le tableau $data à la méthode update() pour mofifier nos données en bdd
					if ($usersModel->update($data, $id)) {

						// Ici l'insertion en base est effectuée
						$success = true;
					}
				}
			}
		# On envoi les erreurs en paramètre à l'aide d'un tableau (array)
		$params = ['profil' => $user, 'errors' => $errors, 'success' => $success, 'user' => $user, 'maxSize' => $maxSize];
		$this->show('default/profil_membre', $params);
	}

	public function barDetail(){
	    $barModel = new Bar();

	    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	      if(!empty($_POST)){
	        $post = array_map('trim', array_map('strip_tags', $_POST));

	        if(isset($post['id'])){
	          if($bar = $barModel->find($post['id'])){
	            echo '
	              <div class="row">
	                <div class="col-md-12 text-center">
	                  <h2 class="section-heading">'.$bar['name'].'</h2>
	                </div>
	              </div>
	              <div class="row">
	                <div class="col-lg-12 barStyle">
	                  <img class="img-rounded img-responsive" src="'.$bar['picture'].'" alt="">
	                </div>
	              </div>
	              <div class="row">
	                <div class="col-lg-12">
	                  <p class="text-left"><span class="titleInfBar">Adresse : </span><span class="infoBar">'.$bar['adress'].'</span></p>
	                  <p class="text-left"><span class="titleInfBar">Télephone : </span><span class="infoBar">'.$bar['phone'].'</span></p>
	                  <p class="text-left"><span class="titleInfBar">Horaire : </span><span class="infoBar">'.$bar['scheduleOpen'].'</span></p>
	                  <p class="text-left"><span class="titleInfBar">Thème : </span><span class="infoBar">aze</span></p>
					  <a class="btn btn-default" href="'.$bar['google_url'].'">Google map</a>
					  <a class="btn btn-default" href="'.$bar['url'].'">Site du bar</a>
	                </div>
	              </div>
				  <div class="clearfix"></div>
	            ';
	          }
	          else{
	            echo 'Le Bar n\'exist pas.';
	          }
	        }
	        else{
	          echo 'Le Bar n\'exist pas.';
	        }
	      }
    }
    else{
      $this->show('w_errors/404');
    }
  }

}
?>
