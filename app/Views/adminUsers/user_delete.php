<?php $this->layout('layout_admin', ['title' => 'Supprimer l\'utilisateur']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Supprimer l'utilisateur'</h1>
	</div>
</div>

<br><br>

<div class="col-lg-3"></div>

<div class="col-lg-6 divFormBarDelete">

	<?php if(!empty($user)): // si l'user n'est pas vide ?>

		<div class="row text-center">
			<div class="col-lg-12 text-center">
				<h4>Etes-vous sûr de vouloir supprimer cet utilisateur ?</h4>
			</div>
		</div>

		<div class="text-center">
			<a class="btnDeleteBar" href="<?=$this->url('admin_users'); ?>">Non</a>
			<a class="btnDeleteBar" href="<?=$this->url('admin_user_delete', ['id' => $user['id'], 'delUser' => 'Oui']); ?>">Oui</a>
		</div>
	
	<?php else: ?>
		<p>L'utilisateur n'existe pas</p>
	<?php endif ?>

</div>

<div class="col-lg-3"></div>

<?php $this->stop('main_content') ?>