<?php $this->layout('layout', ['title' => 'Confirmation Inscription']) ?>

<?php $this->start('main_content') ?>

<br>
<br>
<br>
<?php if(!empty($errors)): ?>
	<div class="alert alert-danger fade in">
		 <a href="#" class="close" data-dismiss="alert">&times;</a>
		 <strong>Erreur ! </strong><?=implode('<br>', $errors); ?>
	</div>
	<a href="<?=$this->url('default_home')?>">Retour au site</a>
<?php endif; ?>
<?php if(isset($success) && $success): ?>
	<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Félicitations!</strong> Votre inscription a bien été confimée.
	</div>
	<a href="<?=$this->url('default_home')?>">Retour au site</a>
<?php endif; ?>

<?php $this->stop('main_content') ?>
