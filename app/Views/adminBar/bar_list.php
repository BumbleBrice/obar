<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>liste des bars</h1>
	</div>
</div>
<br>
<br>
<div>
	
	<?php foreach($bars as $bar): ?>
		<div class="container">
			<h3><?=$bar['name']; ?></h3>
			<p>
				<?=$bar['description']; ?>
			</p>
			<br>
			<br>
			<img src="<?=$bar['picture']; ?>">
			<br>
			<br>
			<a href="<?= $this->url('admin_bar_edit', ['id' => $bar['id']]) ?>">Modifier le bar</a> -
			<a href="<?= $this->url('admin_bar_delete', ['id' => $bar['id']]) ?>">Supprimer le bar</a>
		</div>
	<?php endforeach; ?>

<?php $this->stop('main_content') ?>
