<!-- Slide mise à jour -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center">
           <?php 
			foreach ($articles as $art):?>
				<div>
					<br>
					<strong><?=$art['title']; ?></strong>
					<br>
					<?=$art['content']; ?>
					<br>
					<img src="<?=$this->assetUrl($art['picture']); ?>">
					<br>
					<p><a href="<?=$this->url('blog_readArticle', ['id' => $art['id']]);?>">&raquo; Lire l'article</a></p>
					
					<?php if(isset($w_user['role']) && ($w_user['role'] == 'admin' || $w_user['role'] == 'editor')): //Permet d'afficher le lien uniquament pour les utilisateurs et "admin" et "editor" ?>
					<p><a href="<?=$this->url('blog_updateArticle', array('id' => $art['id'])); ?>">&raquo; Modifier l'article</a></p>
					<?php endif; ?>
					
					<?php if(isset($w_user['role']) && ($w_user['role'] == 'admin' || $w_user['role'] == 'editor')): //Permet d'afficher le lien uniquament pour les utilisateurs et "admin" et "editor" ?>
					<p><a href="<?=$this->url('blog_deleteArticle', array('id' => $art['id'])); ?>">&raquo; Supprimer l'article</a></p>
					<?php endif; ?>
					<hr>
				</div>
	<?php endforeach ?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
