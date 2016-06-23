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
	<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_top">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=$this->url('default_home');?>">Retour au site</a>
            </div>
            <!-- Top Menu Items -->
          
                
             
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse nav_top">
                <ul class="nav navbar-nav side-nav navigation">
                    <li class="">
                        <a class="js-scrollTo button" href="#presentation">Présentation</a>
                    </li>
                    <li>
                       <a class="js-scrollTo button" href="#bar_list">Liste des bars</a>
                    </li>
                    <li>
                       <a class="js-scrollTo button" href="#bar_add">Ajouter un bar</a>
                    </li>
                    <li>
                        <a class="js-scrollTo button" href="#message">Messages</a>
                    </li>
                    <li>
                       <a class="js-scrollTo button" href="#users">Gestion utilisateurs</a>
                    </li>
                    <li>
                        <a class="js-scrollTo button" href="#news_letter">Ajouter une news</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		<!-- <nav id="navigation" class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
			    <div class="pam" id="bs-example-navbar-collapse-1">
					<div class="divButton"><a class="js-scrollTo button" href="#presentation">Présentation</a></div><br>
					<div class="divButton"><a class="js-scrollTo button" href="#bar_list">Liste des bars</a></div><br>
					<div class="divButton"><a class="js-scrollTo button" href="#bar_add">Ajouter un bar</a></div><br>
					<div class="divButton"><a class="js-scrollTo button" href="#message">Messages</a></div><br>
					<div class="divButton"><a class="js-scrollTo button" href="#users">Gestion utilisateurs</a></div><br>
					<div class="divButton"><a class="js-scrollTo button" href="#news_letter">Envoyer une news</a></div><br>
	            </div>
	        </div>    	
        </nav> -->
	</aside>
		<section class="wrapper"><?= $this->section('main_content') ?></section>
	</div>
	<script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>

	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.easing.1.3.js') ?>"></script>
</body>
</html>