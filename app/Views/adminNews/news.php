<?php $this->layout('layout_admin', ['title' => 'Newsletter']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>News</h1>
	</div>
</div>
<br>
<br>
<div class="container divGlobalListBar">
<div class="panel-heading wrapperList">
    <p>Liste des News<p><br>
</div>
	<div class="panel-body listUsers">
		<div class="table-responsive">
			<table class="table table-striped"><br>
				<a type="button btnAddUser" class="btn btn-default " href="<?= $this->url('admin_news_add') ?>">Ajouter une news</a><br><br>
				<thead>
					<th>Quoi?</th>
					<th>Qui?</th>
					<th>Evenement</th>
					<th>Action</th>
				</thead>
				<?php foreach($news as $new): ?>                             
				<tbody>
					<td><?= $new['what'] ?></td>
					<td><?= $new['bar'] ?></td>
					<td><?= $new['msg'] ?></td>
					<td >
					    <div class="btn-group" role="group" aria-label="...">
					      <a type="button" class="btn btn-default" href="<?= $this->url('admin_news_edit', ['id' => $new['id']]) ?>">Modifier</a>
					      <a type="button" class="btn btn-danger" href="<?= $this->url('admin_news_delete', ['id' => $new['id']]) ?>">Supprimer</a>
					    </div>
					</td>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<!-- /.table-responsive -->
	</div>
<!-- /.panel-body -->
</div>

<?php $this->stop('main_content') ?>

