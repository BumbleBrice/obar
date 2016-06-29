<?php $this->layout('layout_admin', ['title' => 'Supprimer un bar']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Supprimer le bar</h1>
	</div>
</div>

<br><br>

<div class="col-lg-3"></div>

<div class="col-lg-6 divFormBarDelete">

	<?php if(!empty($bar)): // si l'article n'est pas vide ?>

		<div class="row text-center">
			<div class="col-lg-12 text-center">
				<h4>Etes-vous sûr de vouloir supprimer ce bar ?</h4>
			</div>
		</div>

		<div class="text-center">
			<a class="btnDeleteBar" href="<?=$this->url('admin_bar_list', ['id' => $bar['id']]); ?>">Non</a>
			<a class="btnDeleteBar" href="<?=$this->url('admin_bar_delete', ['id' => $bar['id'], 'delBar' => 'Oui']); ?>">Oui</a>
		</div>
		

	
	<?php else: ?>
		<p>Le bar n'existe pas</p>
	<?php endif ?>

</div>

<div class="col-lg-3"></div>


<?php $this->stop('main_content') ?>
