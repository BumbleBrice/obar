<!-- Contact -->


<div class="container-fluid">
    <div class="row text-center">
        <div class="col-lg-10 col-lg-offset-1">
            <h2>Nous contacter</h2>
            <?php if(!empty($errors)): //On affiche les erreurs si le tableau est vide ?>
                <div class="alert alert-danger fade in">
                     <a href="#" class="close" data-dismiss="alert">&times;</a>
                     <strong>Erreur ! </strong><?=implode('<br>', $errors); ?>
                </div>
            <?php endif; ?>

            <?php if(isset($success) && $success === true): ?>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Félicitations!</strong> Votre message a bien été envoyé.
                </div>
            <?php else: ?>

            <form class="form-horizontal" method="POST">
                <input type="hidden" name="form" value="contact">
                <div class="form-group">
                    <label for="ct_firstname" class="hidden-xs col-sm-2 control-label">Prénom*</label>
                    <div class="col-sm-10">
                    <input type="text" name="ct_firstname" class="form-control" id="ct_firstname" placeholder="Prénom">
                    <span id="helpBlock" class="help-block">* Commencer par une majuscule.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ct_lastname" class="hidden-xs col-sm-2 control-label">Nom*</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="ct_lastname" id="ct_lastname" placeholder="Nom">
                    <span id="helpBlock" class="help-block">* Commencer par une majuscule.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ct_email" class="hidden-xs col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="ct_email" class="form-control" id="ct_email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="ct_msg" class="hidden-xs col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="ct_msg" placeholder="Votre message"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endif; ?>
