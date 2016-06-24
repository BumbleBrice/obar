<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- Afficher les erreurs -->

<?php if(!empty($errors)): ?>
	<div class="alert alert-danger">
		<ul>
		<?php foreach($errors as $er): ?>
			<li><?=$er;?></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>

<!-- 

foreach pour afficher les bar : a mettre dans le tableau

<div class="container">
	<ul>
		<?php foreach ($bars as $bar) : ?>
			<li class="list-group-item row">
				<?= $bar['title']; ?>
			</li>
		<?php endforeach ;?>
	</ul>
</div>

-->


<!-- Afficher tous les bars -->

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Liste des bars</h1>
	</div>
</div>

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Bordered Table
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Phone</th>
                            <th>Adress</th>
                            <th>Horaire</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>( picture )</td>
                            <td>Le meilleur bar</td>
                            <td>0123456789</td>
                            <td>1 route du chemin</td>
                            <td>10h à 22h</td>
                            <td class="text-center">
								<a type="button" class="btn btn-info" href="?barId=<?=$bar['id'];?>&action=edit">Modifier</a>
								<a type="button" class="btn btn-warning" href="?barId=<?=$bar['id'];?>&action=delete">Supprimer</a>
							</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Mark</td>
                            <td>( picture )</td>
                            <td>Le meilleur bar</td>
                            <td>0123456789</td>
                            <td>1 route du chemin</td>
                            <td>10h à 22h</td>
                            <td class="text-center">
								<a type="button" class="btn btn-info" href="?barId=<?=$bar['id'];?>&action=edit">Modifier</a>
								<a type="button" class="btn btn-warning" href="?barId=<?=$bar['id'];?>&action=delete">Supprimer</a>
							</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Mark</td>
                            <td>( picture )</td>
                            <td>Le meilleur bar</td>
                            <td>0123456789</td>	
                            <td>1 route du chemin</td>
                            <td>10h à 22h</td>
                            <td class="text-center">
								<a type="button" class="btn btn-info" href="?barId=<?=$bar['id'];?>&action=edit">Modifier</a>
								<a type="button" class="btn btn-warning" href="?barId=<?=$bar['id'];?>&action=delete">Supprimer</a>
							</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->


<div hidden>

	<div class="row">
		<div class="col-lg-12 text-center">
			<h1>Modifier le bar</h1>
		</div>
	</div>

	<!-- Modifier le bar -->

	<?php if(isset($success) && $success == true): ?>
		<div class="alert alert-success">Votre bar a été modifié</div>

		<?php elseif(!empty($bar)): // On s'assure qu'un bar est existant ?>
		<form method="post">
			<fieldset>
				<legend style="color:#FFF;">Modifier un bar</legend>
				

				<label for="title">Titre</label>
				<input type="text" name="title" id="title" value="<?=$bar['title'];?>">

				<br><br>
				<label for="content">Contenu</label>
				<textarea id="content" name="content"><?=$bar['content'];?></textarea>

				<br><br>
				<input type="submit" value="Mettre à jour le bar">
			</fieldset>
		</form>
	<?php else: ?>

		<div class="alert alert-danger">Aucun bar correspondant</div>

	<?php endif; ?>

</div>




<div hidden>

	<div class="row">
		<div class="col-lg-12 text-center">
			<h1>Supprimer le bar</h1>
		</div>
	</div>

	<!-- Supprimer le bar -->

	<?php if(!empty($bar)): // Si $bar n'est pas vide ?>
		<h2>Vous voulez supprimer cet bar ?</h2>

		<div class="well well-sm">
			<p><strong>Titre du bar :</strong> <?=$bar['title']; ?></p>
		</div>

		<form method="get">
			<a href="<?=$this->url('admin_home'); ?>" class="btn btn-primary btn-lg">Non</a>

			<input type="submit" name="remove" value="Oui" class="btn btn-danger btn-lg">

		</form>
		<?php else: ?>

			<div class="alert alert-danger">
				Le bar ne semble pas exister
			</div>

		<?php endif; ?>
</div>


<?php $this->stop('main_content') ?>