<?php $this->layout('layout_admin', ['title' => 'Répondre au message']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Répondre au message</h1>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row divListMessage">
            <div class="panel panel-default">
                <div class="panel-body">

                    <p>
                    	<?php 
                    		echo '<span class="txtMessageReponse">Message envoyé par : </span>'.$message['firstname'].' '.$message['lastname'];
                    		echo '<br><span class="txtMessageReponse">Email : </span>'.$message['email'];
                    		echo '<br><br><span class="txtMessageReponse">Message de l\'utilisateur : </span><br>'.$message['content'];
                    	?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<div class="row">
    <div class="col-lg-12">
        <div class="row divListMessage">
            <div class="panel panel-default">
                <div class="panel-body">

                	<form method="POST" role="form">

                		<label for="reponse">Votre réponse</label>
	                    <input type="text" name="reponse" id="reponse" class="form-control champTxtAddBar">

	                    <br><br>
	                    <button type="submit" class="btn btn-default boutonBarAdd">Répondre</button>

                	</form>

                    

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>