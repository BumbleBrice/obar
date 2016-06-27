<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Supprimer le bar</h1>
	</div>
</div>

<br><br>

<div class="divFormBarDelete">

	<?php if(!empty($bar)): // si l'article n'est pas vide ?>

		<div class="row">
			<div class="col-lg-12 text-left">
				<h4>Etes-vous sûr de vouloir supprimer ce bar ?</h4>
			</div>
		</div>
		<a class="btnDeleteBar" href="<?=$this->url('admin_bar_delete', ['id' => $bar['id']]); ?>">Non</a>
		<a class="btnDeleteBar" href="<?=$this->url('admin_bar_delete', ['id' => $bar['id'], 'delBar' => 'Oui']); ?>">oui</a>

	
	<?php else: ?>
		<p>Le bar n'existe pas</p>
	<?php endif ?>

</div>


<?php $this->stop('main_content') ?>
