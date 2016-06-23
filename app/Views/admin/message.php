<div class="row"><div class="col-lg-12 text-center"><h1>Messagerie</h1></div></div>


<!-- /.row -->
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
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>truc@mdo</td>
                                            <td>Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem </td>
                                            <td>11/11/2016</td>
                                            <td>non lu</td>
                                            <td class="text-center">
												<a type="button" class="btn btn-info" href="?id_message=<?=$message['id'];?>">Voir</a>
												<a type="button" class="btn btn-primary" href="?id_message=<?=$message['id'];?>&action=rep">Répondre</a>
												<a type="button" class="btn btn-danger" href="?id_message=<?=$message['id'];?>&action=delete">Supprimer</a>
											</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem </td>
                                            <td>@fat</td>
                                            <td>@fat</td>
                                            <td class="text-center">
												<a type="button" class="btn btn-info" href="?id_message=<?=$message['id'];?>">Voir</a>
												<a type="button" class="btn btn-primary" href="?id_message=<?=$message['id'];?>&action=rep">Répondre</a>
												<a type="button" class="btn btn-danger" href="?id_message=<?=$message['id'];?>&action=delete">Supprimer</a>
											</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td>Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem </td>
                                            <td>@twitter</td>
                                            <td>@twitter</td>
                                        
                                            <td class="text-center">
												<a type="button" class="btn btn-info" href="?id_message=<?=$message['id'];?>">Voir</a>
												<a type="button" class="btn btn-primary" href="?id_message=<?=$message['id'];?>&action=rep">Répondre</a>
												<a type="button" class="btn btn-danger" href="?id_message=<?=$message['id'];?>&action=delete">Supprimer</a>
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
            </div>