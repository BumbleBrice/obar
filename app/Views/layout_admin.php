<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge", chrome=1>
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="fr">
    <meta name="author" content="Jenifer, Alexis, Yoan et Brice pour projet de soutenance lors de la 2eme session WebForce3 a la Philomatique de Bordeaux.">
    <meta name="description" content="Ô Bar vous permettra de visualiser les bars tendance des quartiers de Bordeaux.">
    <meta name="category" content="sortie, rencontre, amusement">
    <meta name="copyright" content="WF3, Jennifer, Alexis, Yoan, Brice">

    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->assetUrl('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $this->assetUrl('css/simple-sidebar.css') ?>" rel="stylesheet">
    <link href="<?= $this->assetUrl('css/style_admin.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Droid+serif|Rouge+Script|RalewayTrochut' rel='stylesheet' type='text/css'>
     
    <!-- Font axesome -->
    <link rel="stylesheet" href="<?= $this->assetUrl('font-awesome/css/font-awesome.min.css') ?>">
    
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
                <a class="navbar-brand boutonRetourSite" href="<?= $this->url('default_home');?>">Retour au site</a>
            </div>
            <!-- Top Menu Items -->



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse nav_top">
                <ul class="nav navbar-nav side-nav navigation">
                    <li>
                        <a href="<?=$this->url('admin_home'); ?>">
                          <div class="button-fill grey">
                            <div class="button-text">Accueil&nbspadmin</div>
                            <div class="button-inside">
                              <div class="inside-text">Accueil&nbspadmin</div>
                            </div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$this->url('admin_bar_add'); ?>">
                          <div class="button-fill grey">
                            <div class="button-text">Ajouter&nbspun&nbspbar</div>
                            <div class="button-inside">
                              <div class="inside-text">Ajouter&nbspun&nbspbar</div>
                            </div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$this->url('admin_bar_list'); ?>">
                          <div class="button-fill grey">
                            <div class="button-text">Liste&nbspdes&nbspbars</div>
                            <div class="button-inside">
                              <div class="inside-text">Liste&nbspses&nbspbars</div>
                            </div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$this->url('admin_users'); ?>">
                          <div class="button-fill grey">
                            <div class="button-text">utilisateur</div>
                            <div class="button-inside">
                              <div class="inside-text">utilisateur</div>
                            </div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$this->url('admin_news'); ?>">
                          <div class="button-fill grey">
                            <div class="button-text">News</div>
                            <div class="button-inside">
                              <div class="inside-text">News</div>
                            </div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$this->url('admin_message'); ?>">
                          <div class="button-fill grey">
                            <div class="button-text">Messagerie</div>
                            <div class="button-inside">
                              <div class="inside-text">Messagerie</div>
                            </div>
                          </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

    </aside>
<section class="contenu">
        <?= $this->section('main_content'); ?>
</section>
    </div>

    <script src="<?= $this->assetUrl('js/jquery.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/script_cookies.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/jquery.easing.1.3.js'); ?>"></script>

    <script src="<?= $this->assetUrl('js/bootstrap.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/bootstrap-filestyle.min.js'); ?>"></script>

    <script src="<?= $this->assetUrl('js/script.js'); ?>"></script>
    <?= $this->section('js'); ?>

</body>
</html>
