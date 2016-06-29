<?php $this->layout('layout_admin', ['title' => 'Liste des utilisateurs']) ?>

<?php $this->start('main_content') ?>
<div class="row"><div class="col-lg-12 text-center"><h1>Gestion des utilisateurs</h1></div></div>


 <div class="row ">
                <div class="col-lg-12">
                        <div class="panel-heading wrapperList">
                            <p>Liste des utilisateurs<p><br>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body listUsers">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <br>
                                    <a type="button" class="btn btn-default btnAddUser" href="<?= $this->url('admin_user_add') ?>">Ajouter un utilisateur</a>
                                    
                                    <br><br>
                                    <thead>
                                        <tr>
                                            <th>Pseudo</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Photo</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($users as $user): ?>                             
                                        <tr>
                                            <td><?= $user['nickname'] ?></td>
                                            <td><?= $user['firstname'] ?></td>
                                            <td><?= $user['lastname'] ?></td>
                                            <td><img class="imgListBar" src="<?=$user['picture']; ?>" alt="photo de '.<?=$user['nickname']; ?>.'"></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['role'] ?></td>
                                            <td class="">
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <a type="button" class="btn btn-default" href="<?= $this->url('admin_user_edit', ['id' => $user['id']]) ?>">Modérer</a>
                                                  <a type="button" class="btn btn-danger" href="<?= $this->url('admin_user_delete', ['id' => $user['id'], 'delUser' => 'Oui']) ?>">Supprimer</a>
                                                </div>
												<!--<?php /* <a type="button" class="btn btn-info btnUsersBar" href="?id_message=<?=$mes['id'];?>">Voir</a>
												<a type="button" class="btn btn-primary btnUsersBar" href="?id_message=<?=$mes['id'];?>&action=rep">Répondre</a>
												<a type="button" class="btn btn-danger btnUsersBar" href="?id_message=<?=$mes['id'];?>&action=delete">Supprimer</a> */ ?>-->
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
                <!-- /.col-lg-6 -->
            </div>
<?php $this->stop('main_content') ?>