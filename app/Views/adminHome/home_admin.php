<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

	<div class="row"><div class="col-lg-12 text-center"><h1 class="page-header">Présentation</h1></div></div>



	<div class="row">
	    <div class="box">
	        <div class="col-lg-12">
	            <hr>
	            <h2 class="brand-name text-center">Description de <strong>Ôbar</strong>
	            </h2>
	            <hr>
	            <?php if(empty($pres)): ?>
	            <p class="text-center"><?= $pres['desc']; ?></p>
	        
	            <?php endif; ?>
	        </div>
	    </div>
	</div>
	<div class="row ">
		<div class="col-lg-offset-5 col-lg-2 col-lg-offset-5">
	           	<a type="button" class="btn btn-secondary btn-lg active boutonModifPresentationBar" href="">Modifier la présentation de Ôbar</a>
		</div>
	</div>



	


<?php $this->stop('main_content') ?>