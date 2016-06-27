<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<div class="row"><div class="col-lg-12 text-center"><h1>Gestion des utilisateurs</h1></div></div>


 <div class="row ">
                <div class="col-lg-12">
                        <div class="panel-heading wrapperList">
                            Liste des utilisateurs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body lustUsers">
                            <div class="table-responsive">
                                <table class="table table-striped">
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
                                    <?php foreach($users as $users): ?>                             
                                        <tr>
                                            <td><?= $users['nickname'] ?></td>
                                            <td><?= $users['firstname'] ?></td>
                                            <td><?= $users['lastname'] ?></td>
                                            <td><?= '<img src="../img/'.$users['picture'].'" alt="Photo de'.$users['nickname'].' recette" width="50">'?><td>
                                            <td><?= $users['picture'] ?></td>
                                            <td><?= $users['email'] ?></td>
                                            <td><?= $users['role'] ?></td>
                                            <td class="">
												<a type="button" class="btn btn-info" href="?id_message=<?=$mes['id'];?>">Voir</a>
												<a type="button" class="btn btn-primary" href="?id_message=<?=$mes['id'];?>&action=rep">Répondre</a>
												<a type="button" class="btn btn-danger" href="?id_message=<?=$mes['id'];?>&action=delete">Supprimer</a>
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