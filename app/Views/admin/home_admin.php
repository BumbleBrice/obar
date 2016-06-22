<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

		<nav id="navigation" class="navbar navbar-fixed-top" role="navigation">
                <ul class="sidebar-nav">
                    <li class=""><a class="js-scrollTo" href="#presentation">Présentation</a></li>
                    <li class=""><a class="js-scrollTo" href="#carte">Carte</a></li>
                    <li class=""><a class="js-scrollTo" href="#bar_list">Liste des bars</a></li>
                    <li class=""><a class="js-scrollTo" href="#bar_add">Ajouter un bar</a></li>
                    <li class=""><a class="js-scrollTo" href="#message">Messages</a></li>
                    <li class=""><a class="js-scrollTo" href="#users">Gestion utilisateurs</a></li>
                </ul>
            </nav>
	<div class="module" id="presentation"><h1>Présentation</h1></div>
	<div class="module" id="carte"><h1>Carte</h1></div>
	<div class="module" id="bar_list"><h1>Liste des bars</h1></div>
	<div class="module" id="bar_add"><h1>Ajouter un bar</h1></div>
	<div class="module" id="message"><h1>Messagerie</h1></div>
	<div class="module" id="users"><h1>Gestion des utilisateurs</h1></div>
<?php $this->stop('main_content') ?>
