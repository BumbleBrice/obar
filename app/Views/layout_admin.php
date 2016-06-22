<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_admin.css') ?>">
</head>
<body>
	<div>
	<aside role="banner" >
		<nav id="navigation" class="navbar navbar-fixed-top" role="navigation">
                <ul class="pam sidebar-nav">
                    <li class=""><a class="js-scrollTo" href="#presentation">Présentation</a></li>
                    <li class=""><a class="js-scrollTo" href="#carte">Carte</a></li>
                    <li class=""><a class="js-scrollTo" href="#bar_list">Liste des bars</a></li>
                    <li class=""><a class="js-scrollTo" href="#bar_add">Ajouter un bar</a></li>
                    <li class=""><a class="js-scrollTo" href="#message">Messages</a></li>
                    <li class=""><a class="js-scrollTo" href="#users">Gestion utilisateurs</a></li>
                </ul>
            </nav>
	</aside>
		<section class="wrapper"><?= $this->section('main_content') ?></section>
	</div>

	<script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.easing.1.3.js') ?>"></script>
</body>
</html>