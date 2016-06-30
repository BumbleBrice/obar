<?php $this->layout('layout_admin', ['title' => 'Newsletter']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>News</h1>
	</div>
</div>


<br><br>
<div class="container divGlobalListBar">
				   <div class="panel-body listNews">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <br>
                                    <a type="button" class="btn btn-default btnAddnew" href="<?= $this->url('admin_new_add') ?>">Ajouter une news</a>
                                    
                                    <br><br>
                                    <thead>
                                        <tr>
                                            <th>What</th>
                                            <th>Who</th>
                                            <th>Evenement</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($News as $new): ?>                             
                                        <tr>
                                            <td><?= $new['what'] ?></td>
                                            <td><?= $new['bar'] ?></td>
                                            <td><?= $new['msg'] ?></td>
                                            <td class="">
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <a type="button" class="btn btn-default" href="<?= $this->url('admin_new_edit', ['id' => $new['id']]) ?>">Modifier</a>
                                                  <a type="button" class="btn btn-danger" href="<?= $this->url('admin_new_delete', ['id' => $new['id']]) ?>">Supprimer</a>
                                                </div>
											</td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

		<?php endforeach; ?>

	</div>
</div>
<?php $this->stop('main_content') ?>

