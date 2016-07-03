<?php $this->layout('layout_admin', ['title' => 'Listes des bars']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>liste des bars</h1>
	</div>
</div>

<br><br>
<div class="container divGlobalListBar">
	<div class="row">

		<?php foreach($bars as $bar): ?>

			<div class="col-lg-5 divListBar">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h3 class="nameListBar"><?=$bar['name']; ?></h3>
					</div>
				</div>

				<br><br>
				<div class="row">
					<div class="col-lg-6">
						<img class="imgListBar" src="<?=$this->assetUrl($bar['picture']); ?>" alt="photo de '.<?=$bar['name']; ?>.'">
					</div>

					<div class="col-lg-6">
						<p class="typeListBar">Quartiers :</p><p class="contentListBar"><?=$bar['quartiers']; ?></p>
						<p class="typeListBar">Description :</p><p class="contentListBarDescription"><?=$bar['description']; ?></p>
						<p class="typeListBar">Téléphone :</p><p class="contentListBar"><?=$bar['phone']; ?></p>
						<p class="typeListBar">Adresse :</p><p class="contentListBar"><?=$bar['adress']; ?></p>
						<p class="typeListBar">Jour d'ouverture :</p><p class="contentListBar"><?=$bar['schedule']; ?></p>
						<p class="typeListBar">Horaire d'ouverture :</p><p class="contentListBar"><?=$bar['scheduleOpen']; ?></p>
						<p class="typeListBar">Lien vers le site :</p><a class="contentListBar" href="<?=$bar['url']; ?>"><?=$bar['url']; ?></a>
					</div>
				</div>

				<br><br>
				<div class="col-lg-12 text-center">
					<a class="btnListBar" href="<?= $this->url('admin_bar_edit', ['id' => $bar['id']]) ?>">Modifier le bar</a>
					<a class="btnListBar" href="<?= $this->url('admin_bar_delete', ['id' => $bar['id']]) ?>">Supprimer le bar</a>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
</div>

<?php $this->stop('main_content') ?>
