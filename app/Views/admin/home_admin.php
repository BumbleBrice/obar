<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<div class="module" id="presentation"><div class="contenue"><h1>Présentation</h1></div></div>
	<div class="module" id="carte"><div class="contenue"><h1>Carte</h1></div></div>
	<div class="module" id="bar_list"><div class="contenue"><h1>Liste des bars</h1></div></div>
	<div class="module" id="bar_add"><div class="contenue"><h1>Ajouter un bar</h1></div></div>
	<div class="module" id="message"><div class="contenue"><h1>Messagerie</h1></div></div>
	<div class="module" id="users"><div class="contenue"><h1>Gestion des utilisateurs</h1></div></div>
<?php $this->stop('main_content') ?>
