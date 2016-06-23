<h1>Liste des bars</h1>

<!-- Afficher les erreurs -->

<?php if(!empty($errors)): ?>
	<div class="alert alert-danger">
		<ul>
		<?php foreach($errors as $er): ?>
			<li><?=$er;?></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>

<!-- Afficher tous les bars -->

<div class="container">
	<ul>
		<?php foreach ($bars as $bar) : ?>
			<li class="list-group-item row">
				<?= $bar['title']; ?>
			</li>
		<?php endforeach ;?>
	</ul>
</div>




<h1>Modifier le bar</h1>

<!-- Modifier le bar -->

<?php if(isset($success) && $success == true): ?>
	<div class="alert alert-success">Votre bar a été modifié</div>

	<?php elseif(!empty($bar)): // On s'assure qu'un bar est existant ?>
	<form method="post">
		<fieldset>
			<legend style="color:#FFF;">Modifier un bar</legend>
			

			<label for="title">Titre</label>
			<input type="text" name="title" id="title" value="<?=$bar['title'];?>">

			<br><br>
			<label for="content">Contenu</label>
			<textarea id="content" name="content"><?=$bar['content'];?></textarea>

			<br><br>
			<input type="submit" value="Mettre à jour le bar">
		</fieldset>
	</form>
<?php else: ?>

	<div class="alert alert-danger">Aucun bar correspondant</div>

<?php endif; ?>




<h1>Supprimer le bar</h1>

<!-- Supprimer le bar -->

<?php if(!empty($bar)): // Si $bar n'est pas vide ?>
	<h2>Vous voulez supprimer cet bar ?</h2>

	<div class="well well-sm">
		<p><strong>Titre du bar :</strong> <?=$bar['title']; ?></p>
	</div>

	<form method="get">
		<a href="<?=$this->url('admin_home'); ?>" class="btn btn-primary btn-lg">Non</a>

		<input type="submit" name="remove" value="Oui" class="btn btn-danger btn-lg">

	</form>
	<?php else: ?>

		<div class="alert alert-danger">
			Le bar ne semble pas exister
		</div>

	<?php endif; ?>

<div class="row"><div class="col-lg-12 text-center"><h1>Liste des bars</h1></div></div>