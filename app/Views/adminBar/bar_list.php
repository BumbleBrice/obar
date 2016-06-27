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
	
		<div class="container divGlobalListBar">
			<div class="row">

				<?php foreach($bars as $bar): ?>

					<div class="col-lg-5 divListBar text-center">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h3 class="nameListBar"><?=$bar['name']; ?></h3>
							</div>
						</div>

						<br><br>
						<div class="row">
							<div class="col-lg-6">
								<img class="imgListBar" src="<?=$bar['picture']; ?>" alt="photo de '.<?=$bar['name']; ?>.'">
							</div>

							<div class="col-lg-6">
								<p class="contentListBar"><?=$bar['description']; ?></p>
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
