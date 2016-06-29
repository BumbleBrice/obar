<?php $this->layout('layout_admin', ['title' => 'Newsletter']) ?>

<?php $this->start('main_content') ?>

<p align=center><font size="6"><font color="red">Envoi de la newsletter</font></font></p>
 
<?php
// On se connecte.
$bdd = new PDO('mysql:host=localhost;dbname=dynamite;charset=utf8', 'root', '');
 
// On récupère les 5 dernières news.
$res = $bdd->prepare('SELECT * FROM news ORDER BY id DESC LIMIT 0, 5');

 
$fichier_message = '<html>
<head>
    <title>Newsletter de MonSite.fr</title>
</head>
<body bgcolor="black">
<font face="verdana"><font color="white"><font size="5"><p align="center"><font color="red"><u>Balzac61</u></font></p></font>
<font size="3">
<p align="left">Voici les dernières news de MonSite.fr :<br /><ul>'; //On définit le message.
 	$donnee = $res->fetchAll(PDO::FETCH_ASSOC); 
    foreach($donnee as $donnee){
    $fichier_message .= '<li>'.$donnee["contenu"].'</li>'; //On ajoute les news au message.
    }
 
$fichier_message .= '</ul></body>
</html>'; // On termine le message.
 
 
// On récupère de la table newsletter les personnes inscrites.
$liste_vrac = $bdd->prepare('SELECT email FROM news_letter');

 
// On définit la liste des inscrits.
	$liste = 'monsite@monsite.fr';
	$donnee = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach($donnee as $donnee){
    $liste .= ','; //On sépare les adresses par une virgule.
    $liste .= $donnees['email'];
    }
		$message = $fichier_message;
		$destinataire = $liste; 
		 
		$date = date("d/m/Y");
		 
		$objet = "Newsletter de MonSite.fr du $date"; // On définit l'objet qui contient la date.
		 
		// On définit le reste des paramètres.
		$headers  = 'MIME-Version: 1.0' . '\r\n';
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		$headers .= 'From: monsite@monsite.fr' . '\r\n'; // On définit l'expéditeur.
		$headers .= 'Bcc:' . $liste . '' . '\r\n'; // On définit les destinataires en copie cachée pour qu'ils ne puissent pas voir les adresses des autres inscrits.
 
 				$mail->isSMTP();                                      	// Set mailer to use SMTP
				$mail->Host = 'smtp..com';  							// Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               	// Enable SMTP authentication
				$mail->Username = '';             						// SMTP username
				$mail->Password = '';                   				// SMTP password
				$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    	// TCP port to connect to

				$mail->setFrom($resto['email'], $_SESSION['user']['nickname']);
				$mail->addAddress($post['email']);   				// Add a recipient, Name is optional
				$mail->isHTML(true);                                  	// Set email format to HTML

				$mail->Subject = 'Contact du site';
				$mail->Body    = nl2br($post['content']);
				$mail->AltBody = $post['content'];	
    // On envoie l'e-mail.
    if (!$mail->send($destinataire, $objet, $fichier_message, $headers) ) 
    {
?>
Envoi de la newsletter réussi.
<?php
    }
    else
    {
?>
Échec de l'envoi de la newsletter.
<?php
    }
?>
<br /><br /><u>Liste des inscrits :</u><br />
<table>
<tr>
<th>e-mail</th>
</tr>
<?php
	$liste_vrac = $bdd->prepare('SELECT email FROM news_letter');

 	$donnees = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach($donnees as $donnee){

 
    {
?>
 
<tr>
<td><?php echo ($donnees['email']); ?></td>
</tr>
 
<?php
    } 
}
?>

<?php $this->stop('main_content') ?>