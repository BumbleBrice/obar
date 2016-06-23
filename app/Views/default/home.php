<?php $this->layout('layout', ['title' => 'Ôbar']) ?>

<?php $this->start('main_content') ?>

<!-- Connexion -->
<section class="connexion container-fluid">
	<form method="POST">
		<input type="hidden" name="form" value="co">
		<label for="co_pseudo"></label>
		<input id="co_pseudo" type="text" name="co_pseudo" placeholder="Pseudo..." required>

		<label for="co_pswd"></label>
		<input id="co_pswd" type="text" name="co_pswd" placeholder="Password..." required>

		<input type="submit" value="connexion">
	</form>
</section>

<!-- Présentation -->
<section class="presentation container-fluid">
	<h1>Présentation</h1>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
		Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br>
		Duis aute irure dolor in reprehenderit.<br>
	</p>
	<form method="POST">
		<input type="hidden" name="form" value="nl">
		<label for="email_nl">Inscription NewsLetter</label>
		<br>
		<input id="email_nl" type="email" name="email_nl" placeholder="Email..." required>
		<br>
		<br>
		<input type="submit" value="Inscription">
	</form>
</section>

<!-- Dernier bar -->
<section class="last_bar">
	<article class="">
		<h2>titre</h2>
		<p>
			paragraphe
		</p>
		<img src="" alt="image" />
	</article>
	<article class="">
		<h2>titre</h2>
		<p>
			paragraphe
		</p>
		<img src="" alt="image" />
	</article>
	<article class="">
		<h2>titre</h2>
		<p>
			paragraphe
		</p>
		<img src="" alt="image" />
	</article>
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
