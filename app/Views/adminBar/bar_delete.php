<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Supprimer le bar</h1>
	</div>
</div>

<br><br>

<?php if(!empty($bar)): // si l'article n'est pas vide ?>

<form method="GET">
	<div class="row">
		<div class="col-lg-12 text-left">
			<h4>Etes-vous sûr de vouloir supprimer ce bar ?</h4>
		</div>
	</div>
	<a class="btnDeleteBar"> href="<?=$this->url('adminBar/bar_delete', ['id' => $bar['id']]); ?>">Non</a>
	<input class="btnDeleteBar" type="submit" name="delBar" value="Oui">
</form>

<?php else: ?>
	<p>Le bar n'existe pas</p>
<?php endif ?>


<?php $this->stop('main_content') ?>