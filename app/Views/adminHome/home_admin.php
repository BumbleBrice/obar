<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

	<div class="row"><div class="col-lg-12 text-center"><h1 class="page-header">Présentation</h1></div></div>



	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="header">
	            <p class="titlePres">Ô Bar</p >
				<?php if(!empty($pres)): ?>
	            	<p class="presentation"><?= $pres['description']; ?></p>
			     <?php endif; ?>
	            <br>
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col-lg-offset-5 col-lg-2 col-lg-offset-5">
	           	<a type="button" class="btn btn-secondary btn-lg active boutonModifPresentationBar" href="<?=$this->url('admin_presentation_edit', array('id' => $pres['id']));?>">Modifier la présentation de Ôbar</a>
		</div>
	</div>


	


<?php $this->stop('main_content') ?>