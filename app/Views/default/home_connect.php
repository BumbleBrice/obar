<?php $this->layout('layout_connect', ['title' => 'Ô Bar | Bordeaux']) ?>

<?php $this->start('main_content') ?>

<?php if(!$w_user): ?>
    <br>
    <br>
    <br>
    <?php if(!empty($errors['connexion'])): ?>
        <div class="alert alert-danger fade in">
        	 <a href="#" class="close" data-dismiss="alert">&times;</a>
        	 <strong>Erreur ! </strong><?=implode('<br>', $errors['connexion']); ?>
        </div>
        <a href="<?$this->url('LostPassword_lostPassword')?>">Mot de passe oublier ?</a>
<?php endif; ?>

<!-- Connexion A FAIRE -->
<section id="connexion" class="connexion">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-lg-10 col-lg-offset-1">
                <form method="POST">
                    <input type="hidden" name="form" value="co">
                    <label for="co_pseudo"></label>
                    <input id="co_pseudo" type="text" name="co_pseudo" placeholder="Pseudo..." required>

                    <label for="co_pswd"></label>
                    <input id="co_pswd" type="password" name="co_pswd" placeholder="Password..." required>

                    <input class="btn btn-primary" type="submit" value="connexion">
                </form> 
            </div>
        </div>
    </div>
</section>

<?php else: ?>

<!-- Profil user -->
<section id="users_profil" class="users_profil">
	<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btn btn-default" href="<?=$this->url('default_profil_membre');?>">Editer le profil</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <img class="img-circle img-responsive centree" src="<?=$this->assetUrl('img/3.jpg');?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                        <h4>Bumble</h4>
                        <p class="subheading ">Et ses ami(e)s !</p>
                    <div class="timeline-body">
                        <p class="text-muted"></p>
                    </div>
                </div>
             </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="userStyle">
                        <img src="<?=$this->assetUrl('img/1.jpg');?>" class="img-responsive img-circle centree" alt="">
                        <p class="text-center">Paula Rie</p>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="userStyle">
                        <img src="<?=$this->assetUrl('img/2.jpg');?>" class="img-responsive img-circle centree" alt="">
                        <p class="text-center">Rom 1</p>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="userStyle">
                        <img src="<?=$this->assetUrl('img/audrey.jpg');?>" class="img-responsive img-circle centree" alt="">
                        <p class="text-center">Kay Garland</p>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="userStyle">
                        <img src="<?=$this->assetUrl('img/bb.jpg');?>" class="img-responsive img-circle centree" alt="">
                        <p class="text-center">Rosa</p>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="userStyle">
                        <img src="<?=$this->assetUrl('img/Indiana.jpg');?>" class="img-responsive img-circle centree" alt="">
                        <p class="text-center">Indiana</p>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="userStyle">
                        <img src="<?=$this->assetUrl('img/Anthony.jpg');?>" class="img-responsive img-circle centree" alt="">
                        <p class="text-center">John Doe</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container -->
</section>

<!--Slice mise à jour-->
<section id="services" class="services bg-primary">
    <div class="container-fluid">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h2><strong><?php echo $this->e($lastbars[0]['what']); ?></strong></h2>
                    <p>
                        <?=$lastbars[0]['bar']; ?>
                        <br>
                        <?=$lastbars[0]['msg']; ?>
                    </p>
                </div>
                <div class="item">
                    <h2><strong><?php echo $this->e($lastbars[1]['what']); ?></strong></h2>
                    <p>
                        <?=$lastbars[1]['bar']; ?>
                        <br>
                        <?=$lastbars[1]['msg']; ?>
                    </p>
                </div>

                <div class="item">
                    <h2><strong><?php echo $this->e($lastbars[2]['what']); ?></strong></h2>
                    <p>
                        <?=$lastbars[2]['bar']; ?>
                        <br>
                        <?=$lastbars[2]['msg']; ?>
                    </p>
                </div>
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>

            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>
</section>

<!-- Carte -->
<section id="map" class="map">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Choisissez votre quartier</h2>
                <svg width="400" height="300">
				    <image xlink:href="<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" src="d<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" width="400" height="300"/>
				</svg>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!-- Contact -->
<section id="contact" class="contact">
	<div class="container-fluid">
    <div class="row text-center">
        <div class="col-lg-10 col-lg-offset-1">
            <h2>Nous contacter</h2>
            <?php if(isset($errors['contact']) && !empty($errors['contact'])): //On affiche les erreurs si le tableau est vide ?>
                <div class="alert alert-danger fade in">
                     <a href="#" class="close" data-dismiss="alert">&times;</a>
                     <strong>Erreur ! </strong><?=implode('<br>', $errors['contact']); ?>
                </div>
            <?php endif; ?>

            <?php if(isset($success['contact']) && $success['contact'] === true): ?>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Félicitations!</strong> Votre message a bien été envoyé.
                </div>
            <?php else: ?>

            <form class="form-horizontal" method="POST">
                <input type="hidden" name="form" value="contact">
                <div class="form-group">
                    <label for="ct_firstname" class="hidden-xs col-sm-2 control-label">Prénom*</label>
                    <div class="col-sm-10">
                    <input type="text" name="ct_firstname" class="form-control" id="ct_firstname" placeholder="Prénom">
                    <span id="helpBlock" class="help-block">* Commencer par une majuscule.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ct_lastname" class="hidden-xs col-sm-2 control-label">Nom*</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="ct_lastname" id="ct_lastname" placeholder="Nom">
                    <span id="helpBlock" class="help-block">* Commencer par une majuscule.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ct_email" class="hidden-xs col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="ct_email" class="form-control" id="ct_email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="ct_msg" class="hidden-xs col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="ct_msg" placeholder="Votre message"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endif; ?>
</section>

<?php endif; ?>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong><?php echo $this->e($infos['name']); ?></strong></h4>
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?=$infos['address']; ?>
                    </li>
                    <li>
                        <i class="fa fa-phone-square" aria-hidden="true""></i>
                        <?=$infos['phone']; ?>
                    </li>
                    <li>
                        <i class="fa fa-envelope-square" aria-hidden="true"></i>
                        <a href="mailto:name@example.com">
                            <?=$infos['email']; ?>
                        </a>
                    </li>
                </ul>
                <ul class="list-inline">
                    <li>
                        <a href="https://fr-fr.facebook.com"><i class="fa fa-facebook fa-fw fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com"><i class="fa fa-twitter fa-fw fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com"><i class="fa fa-instagram fa-fw fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
                <p>Copyright &copy; Ô Bar | Wf3 | 2016</p>
            </div>
        </div>
    </div>
</footer>

<?php $this->stop('main_content') ?>
