<div class="row"><div class="col-lg-12 text-center"><h1>Messagerie</h1></div></div>



            <div class="row">
                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des messages
                        </div>
                        <!-- /.panel-heading -->
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
                                            <th>Statue</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($message as $mes): ?>                             
                                        <tr>
                                            <td><?= $mes['id'] ?></td>
                                            <td><?= $mes['firstname'] ?></td>
                                            <td><?= $mes['lastname'] ?></td>
                                            <td><?= $mes['id'] ?></td>
                                            <td><?= $mes['id'] ?></td>
                                            <td><?= $mes['id'] ?></td>
                                            <td><?= $mes['id'] ?></td>
                                            <td class="text-center">
												<a type="button" class="btn btn-info" href="?id_message=<?=$message['id'];?>">Voir</a>
												<a type="button" class="btn btn-primary" href="?id_message=<?=$message['id'];?>&action=rep">Répondre</a>
												<a type="button" class="btn btn-danger" href="?id_message=<?=$message['id'];?>&action=delete">Supprimer</a>
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