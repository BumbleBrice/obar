<?php $this->layout('layout_admin', ['title' => 'Modifier un bar']) ?>

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

                            <input type="hidden" name="x" value="<?=$bar['x'] ?>">
                            <input type="hidden" name="y" value="<?=$bar['y'] ?>">

                            <div class="form-group">

                                <label for="quartiers" class="display_block">Quartiers</label>

                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="saintpierre" <?php if($bar['quartiers'] == 'saintpierre'){echo 'checked';}?>>Saint Pierre</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="saintpaul" <?php if($bar['quartiers'] == 'saintpaul'){echo 'checked';}?>>Saint Paul</label>
                            </div>

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
                                <label for="schedule">Jour d'ouverture</label><br><br>

								<?php
								 	$jour = explode(', ',$bar['schedule']);
								?>

                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayLundi" id="inlineCheckbox1" value="lundi" <?php if(in_array('Lundi', $jour)){echo 'checked';}?>> Lundi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayMardi" id="inlineCheckbox2" value="mardi" <?php if(in_array('Mardi', $jour)){echo 'checked';}?>> Mardi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayMercredi" id="inlineCheckbox3" value="mercredi" <?php if(in_array('Mercredi', $jour)){echo 'checked';}?>> Mercredi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayJeudi" id="inlineCheckbox4" value="jeudi" <?php if(in_array('Jeudi', $jour)){echo 'checked';}?>> Jeudi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayVendredi" id="inlineCheckbox5" value="vendredi" <?php if(in_array('Vendredi', $jour)){echo 'checked';}?>> Vendredi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="daySamedi" id="inlineCheckbox6" value="samedi" <?php if(in_array('Samedi', $jour)){echo 'checked';}?>> Samedi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayDimanche" id="inlineCheckbox7" value="dimanche" <?php if(in_array('Dimanche', $jour)){echo 'checked';}?>> Dimanche
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="scheduleOpen">Horaire</label>
                                <input type="text" name="scheduleOpen" id="scheduleOpen" class="form-control champTxtAddBar" value="<?=$bar['scheduleOpen'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="url">Lien vers le site du bar</label>
                                <input type="url" name="url" id="url" class="form-control champTxtAddBar" value="<?=$bar['url'] ?>">
                            </div>

                            <button type="reset" class="btn btn-default boutonBarAdd">Recommencer</button>
                            <button type="submit" class="btn btn-default boutonBarAdd">Modifier le bar</button>

                        </form>

                    </div>

                    <div class="col-lg-1"></div>

                	<div class="carte">
						<?php if($bar['quartiers'] == 'saintpierre'): ?>
                        	<img src="<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" alt="Carte Quartier Saint Pierre" class="img-responsive">
						<?php elseif($bar['quartiers'] == 'saintpaul'): ?>
                        	<img src="<?=$this->assetUrl('img/saint_paul.svg'); ?>" alt="Carte Quartier Saint Pierre" class="img-responsive">
						<?php endif; ?>
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

<?php $this->start('js'); ?>
    <script src="<?=$this->assetUrl('js/carteAdd.js');?>">
    </script>
<?php $this->stop('js'); ?>
