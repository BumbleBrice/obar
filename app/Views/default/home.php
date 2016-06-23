<?php $this->layout('layout', ['title' => 'Ôbar']) ?>

<?php $this->start('main_content') ?>

<!-- Connexion -->
<section class="connexion container-fluid">
	<?=$this->insert('default/connexion'); ?>
</section>

<!-- Présentation -->
<section class="presentation container-fluid">
	<?=$this->insert('default/presentation'); ?>
</section>

<!-- Dernier bar -->
<section class="last_bar">
	<?=$this->insert('default/lastBar'); ?>
</section>

<!-- Carte -->
<section class="map container-fluid">
	<section class="carte">

	</section>
</section>

<!-- Inscription -->
<section id="subscribe container-fluid">
	<form method="POST">
		<input type="hidden" name="form" value="isc">
		<label for="isc_pseudo">Pseudo</label>
		<br>
		<input id="isc_pseudo" type="text" name="isc_pseudo" placeholder="Pseudo..." required>
		<br>
		<label for="isc_email">Email</label>
		<br>
		<input id="isc_email" type="email" name="isc_email" placeholder="Email..." required>
		<br>
		<label for="isc_pswd">Password</label>
		<br>
		<input id="isc_pswd" type="password" name="isc_pswd" placeholder="Password..." required>
		<br>
		<label for="isc_pswd_confirm">Verif Password</label>
		<br>
		<input id="isc_pswd_confirm" type="password" name="isc_pswd_confirm" placeholder="Password..." required>
		<br>
		<br>
		<input type="submit" value="Inscription">
	</form>
</section>

<!-- Contact -->
<section id="contact container-fluid">
	<form class="" action="index.html" method="post">
		<input type="hidden" name="form" value="ct">
		<label for="ct_firstname">Nom</label>
		<br>
		<input id="ct_firstname" type="text" name="ct_firstname" placeholder="Nom...">
		<br>
		<label for="ct_lastname">Prenom</label>
		<br>
		<input id="ct_lastname" type="text" name="ct_lastname" placeholder="Prenom...">
		<br>
		<label for="ct_email">Email</label>
		<br>
		<input id="ct_email" type="email" name="ct_email" placeholder="Email...">
		<br>
		<label for="ct_msg">Message</label>
		<br>
		<textarea id="ct_msg" name="ct_msg" rows="8" cols="40" placeholder="Message..." required></textarea>
		<br>
		<br>
		<input type="submit" value="Envoyer">
	</form>
</section>

<?php $this->stop('main_content') ?>
