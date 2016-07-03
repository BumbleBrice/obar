<?php $this->layout('layout', ['title' => 'Ajouter un ami']) ?>

<?php $this->start('main_content') ?>
<br>
<br>
<br>
<br>
<?php if(!empty($errors['search'])): //On affiche les erreurs si le tableau est vide ?>
    <div class="alert alert-danger fade in">
         <a href="#" class="close" data-dismiss="alert">&times;</a>
         <strong>Erreur ! </strong><?=implode('<br>', $errors['search']); ?>
    </div>
<?php endif; ?>
<?php if(!empty($errors['add'])): //On affiche les erreurs si le tableau est vide ?>
    <div class="alert alert-danger fade in">
         <a href="#" class="close" data-dismiss="alert">&times;</a>
         <strong>Erreur ! </strong><?=implode('<br>', $errors['add']); ?>
    </div>
<?php endif; ?>
<?php if($success['add']): ?>
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Félicitations!</strong> vous éte maintenant amis avec <?=$pseudoFriendAdd?>.
    </div>
<?php endif; ?>
<form method="post">
    <input type="hidden" name="form" value="search">

    <label for="amiselect">Cherher un amis</label><br>
    <input type="text" name="search"><br>

    <input type="submit" value="Chercher">
</form>
<?php if(empty($errors['search']) && $success['search']): ?>
    <section>
        <table>
            <thead>
                <tr>
                    <th>picture</th>
                    <th>pseudo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listFriends as $friend): ?>
                    <tr>
                        <td><img src="<?=$this->assetUrl($friend['picture']);?>" alt=""></td>
                        <td><?=$friend['nickname']?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="form" value="add">
                                <input type="hidden" name="friendadd" value="<?=$friend['id']?>">

                                <input type="submit" value="Add">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php endif; ?>

<?php $this->stop('main_content') ?>
