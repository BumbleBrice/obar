<!-- Inscription -->

<div class="container-fluid">
    <div class="row text-center">
        <div class="col-lg-10 col-lg-offset-1">
            <h2>Devenir membre</h2>
            <br>
            <p>En devenant membre, vous aurez la possibilité de vous créer un réseau d'amis afin de partager vos expériences</p>

            <form class="form-horizontal" method="POST">
                <input type="hidden" name="form" value="register">
                <div class="form-group">
                    <label for="nickname" class="hidden-xs col-sm-2 control-label">Pseudo</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Pseudo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="hidden-xs col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="hidden-xs col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                    </div>
                </div>

                <div class="form-group">
                    <label for="passwordOk" class="hidden-xs col-sm-2 control-label">Confirmation</label>
                    <div class="col-sm-10">
                    <input type="passwordOk" class="form-control" id="passwordOk" name="passwordOk" placeholder="Confirmation mot de passe">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                </div>
            </form>
        </div>
    </div>       
</div>