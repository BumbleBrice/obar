<?php $this->layout('layout', ['title' => 'Ô Bar | Bordeaux']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($w_user)){ $this->redirectToRoute('default_home_connect'); } ?>

<!-- Présentation -->
<header id="top" class="header">
	<div class="text-vertical-center">
	    <h1>Ô Bar</h1>
	    <h3><?php echo $this->e($infos['description']); ?></h3>

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
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php if(isset($lastbars[0])): ?>
					<div class="item active">
						<h2><strong><?php echo $this->e($lastbars[0]['what']); ?></strong></h2>
						<p>
							<?=$lastbars[0]['bar']; ?>
							<br>
							<?=$lastbars[0]['msg']; ?>
						</p>
					</div>
				<?php endif; ?>
				<?php if(isset($lastbars[1])): ?>
					<div class="item">
				    	<h2><strong><?php echo $this->e($lastbars[1]['what']); ?></strong></h2>
						<p>
							<?=$lastbars[1]['bar']; ?>
							<br>
							<?=$lastbars[1]['msg']; ?>
						</p>
				    </div>
				<?php endif; ?>
				<?php if(isset($lastbars[2])): ?>
				    <div class="item">
				    	<h2><strong><?php echo $this->e($lastbars[2]['what']); ?></strong></h2>
						<p>
							<?=$lastbars[2]['bar']; ?>
							<br>
							<?=$lastbars[2]['msg']; ?>
						</p>
				    </div>
				<?php endif; ?>
			</div>
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php if(isset($lastbars[0])): ?>
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<?php endif; ?>
				<?php if(isset($lastbars[1])): ?>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				<?php endif; ?>
				<?php if(isset($lastbars[2])): ?>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				<?php endif; ?>
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
		<!-- <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2"> -->
		<?php if($quartiers == 'aucain'): ?>
			<h2>Choisissez votre quartier</h2>
		<?php elseif($quartiers == 'saintpierre'): ?>
			<h2>Saint Pierre</h2>
		<?php elseif($quartiers == 'saintpaul'): ?>
			<h2>Saint Paul</h2>
		<?php endif; ?>
		<section class="carte" style="position: relative;width: 55%;height: 55%;margin-left: 22.5%">
			<?php foreach($bars as $bar): ?>
				<?php if($bar['quartiers'] == $quartiers): ?>
					<div style=" left: <?=$bar['x']?>%; top: <?=$bar['y']?>%;" class="btBar">
						<a class="" href="#" id="toggler" data-id="<?=$bar['id']?>">
							<!-- <i class="fa fa-beer fa-2x text-center" aria-hidden="true"></i><br> -->
							<span class="btBarHover"><?=$bar['name']?></span>
						</a>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<?php if($quartiers == 'aucain'): ?>
				<?php foreach($pointQuartiers as $point): ?>
					<div style=" left: <?=$point['x']?>%; top: <?=$point['y']?>%;" class="btBar">
						<a class="" href="<?=$this->url('default_home')?>?quartiers=<?=$point['quartier']?>" >
							<!-- <i class="fa fa-beer fa-2x text-center" aria-hidden="true"></i><br> -->
							<span class="btBarHover"><?=$point['name']?></span>
						</a>
					</div>
				<?php endforeach; ?>
				<img src="<?=$this->assetUrl('img/les_quartiers-sans-villes.svg'); ?>" alt="Les Quartiers de Bordeaux" class="img-responsive">
			<?php elseif($quartiers == 'saintpierre'): ?>
				<img src="<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" alt="Le Quartier Saint Pierre" class="img-responsive">
			<?php elseif($quartiers == 'saintpaul'): ?>
				<img src="<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" alt="Le Quartier Saint Paul" class="img-responsive">
			<?php endif; ?>
				<div id="toggle" style="position: absolute;top: 0px;left: 0px">
					<div class="container-fluid">
						<div class="btn closeToggle btn-default"><a href="#" id="closeToggle">X</a></div><br>
						<section id="barToggle">
							<div class="row">
								<div class="col-md-12 text-center">
									<h2 class="section-heading">Le Wine Bar...</h2>
									<a class="btn btn-default" href="#formulaire">Editer les infos du bar</a><br>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 barStyle">
									<img class="img-circle img-responsive" src="<?=$this->assetUrl('img/bar.jpg'); ?>" alt="">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p class="text-left"><span class="titleInfBar">Adresse : </span><span class="infoBar">66 rue abbé de l'épee</span></p>
									<p class="text-left"><span class="titleInfBar">Télephone : </span><span class="infoBar">06 59 43 32 16</span></p>
									<p class="text-left"><span class="titleInfBar">Horaire : </span><span class="infoBar"> 11h à 14h </span><span class="titleInfBar">et de </span><span class="infoBar">17h à 01h</span></p>
									<p class="text-left"><span class="titleInfBar">Thème : </span><span class="infoBar">Bar à vins et bar à pute</span></p>
									<a class="btn btn-default" href="https://goo.gl/maps/dzu5DsMRkYt">Se rendre au Le Wine Bar</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</section>
					</div>
				</div>
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
		                    <strong>Félicitations!</strong> Vous avez reçu un email de confirmation a <?=$email_inscription?>.
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
                <h4><strong><?=$this->e($infos['name']); ?></strong></h4>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><?=$infos['address']; ?></li>
                    <li><i class="fa fa-phone-square" aria-hidden="true"></i><?=$infos['phone']; ?></li>
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

<?php $this->start('js') ?>
	<script src="<?$this->assetUrl('js/afficherpoint.js')?>"></script>
<?php $this->stop('js') ?>
