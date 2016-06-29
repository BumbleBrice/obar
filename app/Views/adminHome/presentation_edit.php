<?php $this->layout('layout_admin', ['title' => 'modifier la présentation']) ?>

<?php $this->start('main_content') ?>

<?php if(!empty($errors)): ?>
	<div class="alert alert-danger">
		<ul>
		<?php foreach($errors as $er): ?>
			<li><?=$er;?></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>

<?php if(isset($success) && $success == true): ?>
	<div class="alert alert-success">Votre présentation a été modifié</div>

<?php elseif(!empty($pres)): // On s'assure qu'une presentation est existant?>

	<div class="row"><div class="col-lg-12 text-center"><h2>Vous souhaitez editer la présentation du site</h2></div></div>
	<div class="row">
    	<div class="col-lg-12">
        	<div class="panel panel-default">
           		<div class="panel-body">
                    <form method="POST" role="form">
                        <div class="form-group">
							<label for="description">Modifier la déscription</label>
							<textarea type="text" class="form-control champTxtAddBar" name="description" id="desc"><?=$pres['description'];?></textarea>

							<br><br>
							<div class="col-lg-offset-5 col-lg-2 col-lg-offset-5">
							<input type="submit" class="btn btn-secondary btn-lg active boutonModifPresentationBar" value="Modifier la présentation de Ôbar">
							</div>
						</div>
					</form>
					<?php else: ?>

					<div class="alert alert-danger">Aucun article correspondant</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php $this->stop('main_content') ?>
