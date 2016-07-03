<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link href="<?= $this->assetUrl('css/stylish-portfolio.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,700,300|Comfortaa:400,700,300|Roboto:400,300italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet" type="text/css">

    <!-- Font axesome -->
    <link rel="stylesheet" href="<?= $this->assetUrl('font-awesome/css/font-awesome.min.css') ?>">

    <!-- CSS personnalisé -->
    <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav id="custom-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <a class="navbar-brand page-scroll" href="<?= $this->url('default_home')?>">
                <img id="logo" alt="Brand" src="<?= $this->assetUrl('img/logo_obar.png') ?>" width="27px"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-top">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden active">
                        <a class="page-scroll" href="#top"></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Les quartiers <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=$this->url('default_home')?>?quartiers=saintpierre#map">Saint-Pierre</a></li>
                            <li><a href="<?=$this->url('default_home')?>?quartiers=saintpaul#map">Saint-Paul</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=$this->url('default_home')?>?quartiers=#map">Carte</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=$this->url('default_home')?>#subs">Inscription</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=$this->url('default_home')?>#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= $this->url('default_home_connect')?>">Connexion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?= $this->section('main_content'); ?>


    <!-- JS personnalisé -->
    <script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/script_cookies.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/js.js') ?>"></script>
</body>

</html>
