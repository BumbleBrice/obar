<?php $this->layout('layout_admin', ['title' => 'Supprimer un news']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Supprimer la news</h1>
	</div>
</div>

<br><br>

<div class="col-lg-3"></div>

<div class="col-lg-6 divFormBarDelete">

	<?php if(!empty($new)): // si l'new n'est pas vide ?>

		<div class="row text-center">
			<div class="col-lg-12 text-center">
				<h4>Etes-vous sûr de vouloir supprimer cet news ?</h4>
			</div>
		</div>

		<div class="text-center">
			<a class="btnDeleteBar" href="<?=$this->url('admin_news'); ?>">Non</a>
			<a class="btnDeleteBar" href="<?=$this->url('admin_news_delete', ['id' => $new['id'], 'delNews' => 'Oui']); ?>">Oui</a>
		</div>

	<?php else: ?>
		<p>La news n'existe pas</p>
	<?php endif ?>

</div>

<div class="col-lg-3"></div>

<?php $this->stop('main_content') ?>
