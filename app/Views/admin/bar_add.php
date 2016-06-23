<h1>Ajouter un bar</h1>

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
	<div class="alert alert-success">Votre bar a été ajouté</div>
<?php else: ?>
	<form method="post" enctype="multipart/form-data">
		<fieldset>
			<legend style="color:#FFF;">Ajouter un bar</legend>
			

			<label for="title">Titre</label>
			<input type="text" name="title" id="title">

			<br><br>
			<label for="content">Contenu</label>
			<textarea id="content" name="content"></textarea>

			<br><br>
			<label for="picture">Image</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxSize;?>">
			<input type="file" id="picture" name="picture">

			<br><br>
			<input type="submit" value="Ajouter le bar">
		</fieldset>
	</form>
<?php endif; ?>