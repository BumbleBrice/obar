<?php $this->layout('layout_admin', ['title' => 'Ajouter un bar']) ?>

<?php $this->start('main_content'); ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Ajouter un bar</h1>
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
	<div class="alert alert-success">Votre bar a été ajouté</div>
<?php else: ?>

<?php endif; ?>

<div class="row divFormAddBar">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-5">

                        <form method="POST" role="form" enctype="multipart/form-data">

							<input type="hidden" name="x" value="">
							<input type="hidden" name="y" value="">

                            <div class="form-group">
                                
                                <label for="quartiers" class="display_block">Quartiers</label>

                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="saintpierre">Saint Pierre</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="saintpaul">Saint Paul</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="quinconces">Quinconces</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="meriadeck">Meriadeck</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="quinconces">Quinconces</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="gambetta">Gambetta</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="hoteldeville">Hôtel de ville</label>
                                <label  id="quartiers" class="radio-inline quartierAddBar"><input type="radio" name="quartiers" value="saintmichel">Saint Michel</label>
                                
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control champTxtAddBar">
                            </div>

                            <div class="form-group">
                                <label for="picture">Image du bar</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxSize; ?>">
                                <input type="file" name="picture" id="picture" class="filestyle" data-badge="false">
                            </div>

                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea name="content" id="content" class="form-control champTxtAddBar" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="tel" name="phone" id="phone" class="form-control champTxtAddBar">
                            </div>

                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input type="text" name="address" id="address" class="form-control champTxtAddBar">
                            </div>

                            <div class="form-group">
                                <label for="schedule">Jour d'ouverture</label><br><br>

                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayLundi" id="inlineCheckbox1" value="lundi"> Lundi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayMardi" id="inlineCheckbox2" value="mardi"> Mardi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayMercredi" id="inlineCheckbox3" value="mercredi"> Mercredi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayJeudi" id="inlineCheckbox4" value="jeudi"> Jeudi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayVendredi" id="inlineCheckbox5" value="vendredi"> Vendredi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="daySamedi" id="inlineCheckbox6" value="samedi"> Samedi
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="dayDimanche" id="inlineCheckbox7" value="dimanche"> Dimanche
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="scheduleOpen">Horaire</label>
                                <input type="text" name="scheduleOpen" id="scheduleOpen" class="form-control champTxtAddBar" placeholder="exemple : 8h30 à 12h00 et de 13h30 à 23h30">
                            </div>

                            <div class="form-group">
                                <label for="url">Lien vers le site du bar</label>
                                <input type="url" name="url" id="url" class="form-control champTxtAddBar" placeholder="www.MonSite.fr">
                            </div>

                            <br><br>
                            <button type="reset" class="btn btn-default boutonBarAdd">Recommencer</button>
                            <button type="submit" class="btn btn-default boutonBarAdd">Ajouter le bar</button>

                        </form>

                    </div>

                    <div class="col-lg-1"></div>

                    <div class="carte">
						<img src="<?=$this->assetUrl('img/Quartier-saint_pierre.svg'); ?>" alt="Carte Quartier Saint Pierre" class="img-responsive">
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

<?php $this->stop('main_content'); ?>

<?php $this->start('js'); ?>
	<script src="<?=$this->assetUrl('js/carteAdd.js');?>">
	</script>
<?php $this->stop('js'); ?>
