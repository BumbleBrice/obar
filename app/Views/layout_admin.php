<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->e($title) ?></title>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif|Rouge+Script|Raleway|Trochut' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_admin.css') ?>">
</head>
<body>
	<div class="wrapper">
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
                <a class="navbar-brand boutonRetourSite" href="<?=$this->url('default_home');?>">Retour au site</a>
            </div>
            <!-- Top Menu Items -->
          
                
             
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse nav_top">
                <ul class="nav navbar-nav side-nav navigation">
                    <li>
                        <a class="button" href="">Accueil admin</a>
                    </li>
                    <li>
                       <a class="button" href="<?=$this->url('admin_bar_list'); ?>">Liste des bars</a>
                    </li>
                    <li>
                       <a class="button" href="<?=$this->url('admin_bar_add'); ?>">Ajouter un bar</a>
                    </li>
                    <li>
                        <a class="button" href="<?=$this->url('admin_message'); ?>">Messagerie</a>
                    </li>
                    <li>
                       <a class="button" href="<?=$this->url('admin_users'); ?>">Gestion utilisateur</a>
                    </li>
                    <li>
                        <a class="button" href="<?=$this->url('admin_newsletter'); ?>">Newsletter</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		
	</aside>
		<section class="contenu"><?= $this->section('main_content') ?></section>
	</div>
	<script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>

	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery.easing.1.3.js') ?>"></script>
    
    <script src="<?= $this->assetUrl('js/bootstrap-filestyle.min.js') ?>"></script>

</body>
</html>