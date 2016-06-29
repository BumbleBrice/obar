<?php $this->layout('layout', ['title' => 'Ô Bar | Bordeaux']) ?>

<?php $this->start('main_content') ?>

<!-- Présentation -->
<header id="top" class="header">
	<div class="text-vertical-center">
	    <h1>Ô Bar</h1>
	    <h3><?php echo $this->e($infos['desc']); ?></h3>

	    <!-- Begin MailChimp Signup Form -->
	    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">

	    <div id="mc_embed_signup">
	        <form action="//twitter.us13.list-manage.com/subscribe/post?u=7145e347cec5f3e12eec87b37&amp;id=ea200e434f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	            <div id="mc_embed_signup_scroll">
	                <p>Newsletter</p>
	                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="adresse email" required>
	                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	                <div style="position: absolute; left: -5000px;" aria-hidden="true">
	                    <input type="text" name="b_7145e347cec5f3e12eec87b37_ea200e434f" tabindex="-1" value="">
	                </div>
	                <div class="clear">
	                    <input type="submit" value="S'abonner" name="subscribe" id="mc-embedded-subscribe" class="button">
	                </div>
	            </div>
	        </form>
	    </div>
	    <!--End mc_embed_signup-->
	</div>
</header>

<!--Slice mise à jour-->
<section id="services" class="services bg-primary">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-sm-4">
				<?php foreach($bars as $bar): ?>
					<h4><strong><?php echo $this->e($bar['name']); ?></strong></h4>
					<img src="<?=$this->assetUrl($bar['picture']); ?>">
					<p>
						<?=$bar['adress']; ?>
						<br>
						<?=$bar['phone']; ?>
						<br>
						<?=$bar['description']; ?>
					</p>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- Carte -->
<section id="map" class="map">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-12">
            	<div class="text-center">
	                <h2>Choisissez votre quartier</h2>
	                <img src="<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" alt="Carte Quartier Saint Pierre" class="img-responsive">
              	</div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!-- Inscription -->
<section id="subs" class="subs">
	<div class="container-fluid">
	    <div class="row text-center">
	        <div class="col-lg-10 col-lg-offset-1">
	            <h2>Devenir membre</h2>
	            <br>
	            <p>En devenant membre, vous aurez la possibilité de vous créer un réseau d'amis afin de partager vos expériences</p>

		            <?php if(isset($errors['register']) && !empty($errors['register'])): //On affiche les erreurs si le tableau est vide ?>
		                <div class="alert alert-danger fade in">
		                     <a href="#" class="close" data-dismiss="alert">&times;</a>
		                     <strong>Erreur ! </strong><?=implode('<br>', $errors['register']); ?>
		                </div>
		            <?php endif; ?>

		            <?php if(isset($success['register']) && $success['register'] === true): ?>
		                <div class="alert alert-success fade in">
		                    <a href="#" class="close" data-dismiss="alert">&times;</a>
		                    <strong>Félicitations!</strong> Votre message a bien été envoyé.
		                </div>
		            <?php endif; ?>

	            <form class="form-horizontal" method="POST">
	                <input type="hidden" name="form" value="register">
	                <div class="form-group">
	                    <label for="nickname" class="hidden-xs col-sm-2 control-label">Pseudo</label>
	                    <div class="col-sm-10">
	                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Pseudo">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="email" class="hidden-xs col-sm-2 control-label">Email</label>
	                    <div class="col-sm-10">
	                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="password" class="hidden-xs col-sm-2 control-label">Mot de passe</label>
	                    <div class="col-sm-10">
	                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="passwordOk" class="hidden-xs col-sm-2 control-label">Confirmation</label>
	                    <div class="col-sm-10">
	                    <input type="password" class="form-control" id="passwordOk" name="passwordOk" placeholder="Confirmation mot de passe">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-offset-2 col-sm-10">
	                    <button type="submit" class="btn btn-primary">S'inscrire</button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
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

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong><?php echo $this->e($infos['name']); ?></strong></h4>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$infos['address']; ?></li>
                    <li><i class="fa fa-phone-square" aria-hidden="true""></i><?=$infos['phone']; ?></li>
                    <li><i class="fa fa-envelope-square" aria-hidden="true"></i><a href="mailto:name@example.com"><?=$infos['email']; ?></a>
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
