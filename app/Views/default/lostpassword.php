<?php $this->layout('layout', ['title' => 'Reset Password']) ?>

<?php $this->start('main_content') ?>
	<h1>teste</h1>
	<?php if(!empty($errors)): //On affiche les erreurs si le tableau est vide ?>
		<div class="alert alert-danger fade in">
			 <a href="#" class="close" data-dismiss="alert">&times;</a>
			 <strong>Erreur ! </strong><?=implode('<br>', $errors); ?>
		</div>
	<?php endif; ?>
	<?php if($success): ?>
		<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Félicitations!</strong> Votre mot de passe a bien été modifié.
		</div>
	<?php endif; ?>
	<form method="POST">
		<input>
		<label for="email">Email</label><br>
		<input id="email" type="email" name="email">
		<br>
		<br>
		<input type="submit" value="Envoyer">
	</form>
	<form method="POST">
		<label for="password">Password</label><br>
		<input id="password" type="password" name="password">
		<br>
		<label for="password_confirm">Password</label><br>
		<input id="password_confirm" type="password_confirm" name="password_confirm">
		<br>
		<br>
		<input type="submit" value="Envoyer">
	</form>
<?php $this->stop('main_content') ?>
