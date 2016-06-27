<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>modifier le bar</h1>
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
	<div class="alert alert-success">Votre bar a été modifié</div>
<?php else: ?>

<?php endif; ?>

<div class="row divFormEditBar">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-5">

                        <form method="POST" role="form" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control champTxtAddBar" value="<?=$bar['name'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="picture">Image du bar</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxSize; ?>">
                                <input type="file" name="picture" id="picture" class="filestyle" data-badge="false">
                            </div>

                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea name="content" id="content" class="form-control champTxtAddBar" rows="3"><?=$bar['description'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="tel" name="phone" id="phone" class="form-control champTxtAddBar" value="<?=$bar['phone'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input type="text" name="address" id="address" class="form-control champTxtAddBar" value="<?=$bar['adress'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="schedule">Horaire</label>
                                <input type="int" name="schedule" id="schedule" class="form-control champTxtAddBar" value="<?=$bar['schedule']?>">
                            </div>

                            <button type="reset" class="btn btn-default boutonBarAdd">Recommencer</button>
                            <button type="reset" class="btn btn-default boutonBarAdd btn-resetBar">Replacer le bar</button>

                            <button type="submit" class="btn btn-default boutonBarAdd">Ajouter le bar</button>

                        </form>

                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-5 carte">

                    	<div class="map">

                    		<!-- Carte -->

                    	</div>

                    </div>

                    <div class="col-lg-1"></div>

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

<?php $this->stop('main_content') ?>
