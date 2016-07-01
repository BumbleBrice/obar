<?php $this->layout('layout_admin', ['title' => 'Modifier une news']) ?>

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
	<div class="alert alert-success">Votre news a été modifié</div>
<?php else: ?>

<?php endif; ?>

<div class="row divFormAddBar">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                        <form method="POST" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="what">Quoi?</label>
                                <input name="what" id="what" class="form-control champTxtAddBar" value="<?=$news['what'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bar">Qui?</label>
                                <input type="text" name="bar" id="bar" class="form-control champTxtAddBar" value="<?=$news['bar'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="msg">Message</label>
                                <input type="text" name="msg" id="msg" class="form-control champTxtAddBar" value="<?=$news['msg'] ?>">
                            </div>

                            <br><br>
                            <button type="submit" class="btn btn-default boutonBarAdd">Modifier la news</button>
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

<?php $this->stop('main_content') ?>
