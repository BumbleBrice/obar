<?php $this->layout('layout_admin', ['title' => 'Supprimer le message']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Supprimer le message</h1>
	</div>
</div>

<br><br>

<div class="col-lg-3"></div>

<div class="col-lg-6 divFormBarDelete">

	<?php if(!empty($message)): // si le message n'est pas vide ?>

		<div class="row text-center">
			<div class="col-lg-12 text-center">
				<h4>Etes-vous sûr de vouloir supprimer ce message ?</h4>
			</div>
		</div>

		<div class="text-center">
			<a class="btnDeleteBar" href="<?=$this->url('admin_message'); ?>">Non</a>
			<a class="btnDeleteBar" href="<?=$this->url('admin_message_delete', ['id' => $message['id'], 'delMessage' => 'Oui']); ?>">Oui</a>
		</div>
	
	<?php else: ?>
		<p>Le message n'existe pas</p>
	<?php endif ?>

</div>

<div class="col-lg-3"></div>

<?php $this->stop('main_content') ?>