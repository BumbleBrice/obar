<?php $this->layout('layout_admin', ['title' => 'Messagerie']) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div class="col-lg-12 text-center">
        <h1>Messagerie</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

        <div class="panel-heading listMessage">
            <p>Liste des messages<p><br>
        </div><!-- /.panel-heading -->

        <div class="row divListMessage">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date de réçeption</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($message as $mes): ?>                             
                                <tr>
                                    <td><?= $mes['id'] ?></td>
                                    <td><?= $mes['firstname'] ?></td>
                                    <td><?= $mes['lastname'] ?></td>
                                    <td><?= $mes['email'] ?></td>
                                    <td><?= $mes['content'] ?></td>
                                    <td><?= $mes['date_add'] ?></td>
                                    <td><?= $mes['message_state'] ?></td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-primary" href="<?= $this->url('admin_message_read', ['id' => $mes['id']]) ?>">Répondre</a>
                                        <a type="button" class="btn btn-danger" href="<?= $this->url('admin_message_delete', ['id' => $mes['id']]) ?>">Supprimer</a>
    								</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.col-lg-6 -->
</div>

<?php $this->stop('main_content') ?>