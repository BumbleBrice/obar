<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif|Rouge+Script|Raleway|Trochut' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_admin.css') ?>">
</head>
<body>
	<div>
	<aside role="banner" >
		<nav id="navigation" class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>

			      </button>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <ul class="pam nav navbar-nav">
		                <li class=""><a class="js-scrollTo" href="#presentation">Présentation<span class="sr-only">(current)</span></a></li>
		                <li class=""><a class="js-scrollTo" href="#carte">Carte</a></li>
		                <li class=""><a class="js-scrollTo" href="#bar_list">Liste des bars</a></li>
		                <li class=""><a class="js-scrollTo" href="#bar_add">Ajouter un bar</a></li>
		                <li class=""><a class="js-scrollTo" href="#message">Messages</a></li>
		                <li class=""><a class="js-scrollTo" href="#users">Gestion utilisateurs</a></li>
		                <li class=""><a class="js-scrollTo" href="#news_letter">Envoyer une news</a></li>
		            </ul>
	            </div>
	        </div>    	
        </nav>
	</aside>
		<section class="wrapper"><?= $this->section('main_content') ?></section>
	</div>

	<script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.easing.1.3.js') ?>"></script>
</body>
</html>