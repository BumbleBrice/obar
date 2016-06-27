<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wf3 Bordeaux">

    <title><?= $this->e($title) ?></title>
    <meta name="description" content="Ô Bar vous permettra de visualiser les bars tendance des quartiers de Bordeaux.">

    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->assetUrl('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $this->assetUrl('css/stylish-portfolio.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,700,300|Comfortaa:400,700,300|Roboto:400,300italic' rel='stylesheet' type='text/css'>

    <!-- CSS personnalisé -->
    <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav id="custom-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                <img alt="Brand" src="..."></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Carte</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Les quartiers <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Vieux Bordeaux</a></li>
                            <li><a href="#">Saint Pierre</a></li>
                            <li><a href="#">Bastide</a></li>
                            <li><a href="#">Chartrons</a></li>
                            <li><a href="#">Victoire</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="#subs">Inscription</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#connect">Connexion</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=$this->url('default_home', ['deconnect'=>'1']);?>">
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <?= $this->section('main_content') ?>
    
    
    <!-- Footer -->
    <footer>
        <div class="container-fluid diagonal">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Ô Bar</strong>
                    </h4>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i>numéro</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">contact@obar.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Wf3 | 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
    <!-- JS personnalisé -->
    <script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/js.js') ?>"></script>
</body>

</html>
