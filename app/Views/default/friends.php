<?php $this->layout('layout_connect', ['title' => 'Ajouter un ami']) ?>

<?php $this->start('main_content') ?>
<section style="background:#b2ebe5;">
<br>
<br>
<br>
<br><a class="btn btn-default" href="<?=$this->url('default_home_connect');?>">Retour profil</a>
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
        <strong>Félicitations !</strong> Vous êtes maintenant ami avec <?=$pseudoFriendAdd?>.
    </div>
<?php endif; ?>          
<div class="container">                
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <input type="hidden" name="form" value="search">

            <label for="amiselect">Chercher un ami</label><br>
            <input class="form-control" type="text" name="search"><br>

            <input class="btn btn-default" type="submit" value="Chercher">
        </div>
    </form>
</div>    
<?php if(empty($errors['search']) && $success['search']): ?>
    <?php foreach($listFriends as $friend): ?>
        <div class="col-xs-4 col-sm-3 col-md-2">
            <div class="userStyle">
                <img src="<?=$this->assetUrl($friend['picture']);?>" class="img-responsive img-circle centree" alt="photo de <?=$friend['nickname']?>">
                <p class="text-center"><?=$friend['nickname']?></p>
                <form method="post">
                    <input type="hidden" name="form" value="Ajouter">
                    <input type="hidden" name="friendadd" value="<?=$friend['id']?>">

                    <input class="btn btn-default" type="submit" value="Ajouter">
                </form>              
            </div>
        </div>          
    <?php endforeach; ?>
</section>
<?php endif; ?>

<?php $this->stop('main_content') ?>
