<?php $this->layout('layout_admin', ['title' => 'Ajouter une news']) ?>

<?php $this->start('main_content'); ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Ajouter une news</h1>
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
	<div class="alert alert-success">Votre news a été ajouté</div>
<?php else: ?>

<?php endif; ?>

<div class="row divFormAddBar">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                        <form method="POST" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="what">Quoi?</label>
                                <input name="what" id="what" class="form-control champTxtAddBar" placeholder="Doit commencer par une majuscule">
                            </div>

                            <div class="form-group">
                                <label for="bar">Qui?</label>
                                <input type="text" name="bar" id="bar" class="form-control champTxtAddBar" placeholder="Doit commencer par une majuscule">
                            </div>
                            <div class="form-group">
                                <label for="msg">Message</label>
                                <input type="text" name="msg" id="msg" class="form-control champTxtAddBar" placeholder="Doit commencer par une majuscule">
                            </div>

                            <br><br>
                            <button type="reset" class="btn btn-default boutonBarAdd">Recommencer</button>
                            <button type="submit" class="btn btn-default boutonBarAdd">Ajouter la news</button>
                        </form>
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
