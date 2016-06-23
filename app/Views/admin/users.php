<div class="row"><div class="col-lg-12 text-center"><h1>Gestion des utilisateurs</h1></div></div>


 <div class="row">
                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des utilisateurs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pseudo</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
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
                                            <td><?= $users['email'] ?></td>
                                            <td><?= $users['role'] ?></td>
                                            <td class="text-center">
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
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>