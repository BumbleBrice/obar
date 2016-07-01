<?php $this->layout('layout_admin', ['title' => 'Ajouter un utilisateur']) ?>

<?php $this->start('main_content'); ?>

<div class="row">
    <div class="col-lg-12 text-center">
        <h1>Ajouter un utilisateur</h1>
    </div>
</div>

<br><br>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach($errors as $er): ?>
            <li><?=$er;?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(isset($success) && $success == true): ?>
    <div class="alert alert-success">Votre utilisateur a été ajouté</div>
<?php else: ?>

<?php endif; ?>

<?php 

if(isset($post['nickname']) && !empty($post['nickname'])){
    $nickname = $post['nickname'];
}
else {
    $nickname = '';
}
if(isset($post['firstname']) && !empty($post['firstname'])){
    $firstname = $post['firstname'];
}
else {
    $firstname = '';
}
if(isset($post['lastname']) && !empty($post['lastname'])){
    $lastname = $post['lastname'];
}
else {
    $lastname = '';
}
if(isset($post['email']) && !empty($post['email'])){
    $email = $post['email'];
}
else {
    $email = '';
}
?>

<div class="row divFormAddBar">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                        <form method="POST" role="form" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="nickname">Pseudo</label>
                                <input type="text" name="nickname" id="nickname" class="form-control champTxtAddBar" value="<?= $nickname ?>">
                            </div>

                            <div class="form-group">
                                <label for="firstname">Prénom</label>
                                <input type="text" name="firstname" id="firstname" class="form-control champTxtAddBar" value="<?= $firstname ?>">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Nom</label>
                                <input type="text" name="lastname" id="lastname" class="form-control champTxtAddBar" value="<?= $lastname ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control champTxtAddBar" value="<?= $email ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control champTxtAddBar">
                            </div>

                            <div class="form-group">
                                <label for="picture">Avatar de l'utilisateur</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxSize; ?>">
                                <input type="file" name="picture" id="picture" class="filestyle" data-badge="false">
                            </div>

                            <div class="form-group">
                                <label for="role">Rôle</label>
                                <select name="role" id="role">
                                    <option value="user">User</option>
                                    <option value="owner">Owner</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <br><br>
                            <button type="reset" class="btn btn-default boutonBarAdd">Recommencer</button>
                            <button type="submit" class="btn btn-default boutonBarAdd">Ajouter l'utilisateur</button>

                        </form>

                    </div>

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php $this->stop('main_content'); ?>

<?php $this->start('js'); ?>
    <script src="<?=$this->assetUrl('js/carteAdd.js');?>">
    </script>
<?php $this->stop('js'); ?>
