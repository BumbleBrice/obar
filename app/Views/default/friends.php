<?php $this->layout('layout', ['title' => 'Ajouter un ami']) ?>

<?php $this->start('main_content') ?>
<br>
<br>
<br>
<br>
<form method="post">
    <label for="amiselect">Selectioner un amis</label>
    <select id="amiselect" name="amiselect">
        <?php foreach($listUsers as $user): ?>
            <?php if($user['id'] != $w_user['id'] && !in_array($user['id'], $listFriends)): ?>
                <option value="<?=$user['id']?>"><?=$user['nickname']?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Ajouter Amis">
</form>

<?php $this->stop('main_content') ?>
