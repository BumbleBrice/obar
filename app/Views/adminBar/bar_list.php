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

			<div class="row">
				<div class="col-lg-12 text-center">
					<h3 class="nameListBar"><?=$bar['name']; ?></h3>
				</div>
			</div>

			<br><br>
			<div class="col-lg-6"></div>
			<p class="contentListBar"><?=$bar['description']; ?></p>

			<br><br>
			<img src="<?=$bar['picture']; ?>" class="imgListBar" >

			<br><br>
			<a class="btnListBar" href="<?= $this->url('admin_bar_edit', ['id' => $bar['id']]) ?>">Modifier le bar</a>
			<a class="btnListBar" href="<?= $this->url('admin_bar_delete', ['id' => $bar['id']]) ?>">Supprimer le bar</a>

		</div>
	<?php endforeach; ?>

<?php $this->stop('main_content') ?>
