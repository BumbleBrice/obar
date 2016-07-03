<?php $this->layout('layout_profil_membre', ['title' => 'Modifier profil']) ?>

<?php $this->start('main_content') ?>

<section id="profil" class="profil">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-lg-10 col-lg-offset-1">
                <h2>Modifier mon profil</h2>
                <br>
                <?php if(isset($errors) && !empty($errors)): //On affiche les erreurs si le tableau est vide ?>
                    <div class="alert alert-danger fade in">
                         <a href="#" class="close" data-dismiss="alert">&times;</a>
                         <strong>Erreur ! </strong><?=implode('<br>', $errors); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($success) && $success === true): ?>
                    <div class="alert alert-success fade in">
                        <a href="#" data-dismiss="alert">&times;</a>
                        <strong>Félicitations!</strong> Vos modifications ont bien été enregistrées.
                        <a class="btn btn-primary" href="<?=$this->url('default_home_connect')?>">Retour au profil</a>
                    </div>
                <?php else: ?>

                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nickname" class="hidden-xs col-sm-2 control-label">Pseudo</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Pseudo" value="<?=$w_user['nickname'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="hidden-xs col-sm-2 control-label">Prénom</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" value="<?=$w_user['firstname'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="hidden-xs col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Prénom" value="<?=$w_user['lastname'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="hidden-xs col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$w_user['email'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture" class="hidden-xs col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxSize; ?>">
                            <input type="file" class="form-control" id="picture" name="picture">
                            <span class="help-block">image (maximum 5Mo)</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a class="btn btn-primary" href="<?=$this->url('default_home_connect')?>">Retour au profil</a>
                        </div>
                    </div>
                </form>
            <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php $this->stop('main_content') ?>
