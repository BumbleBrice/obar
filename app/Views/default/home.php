<?php $this->layout('layout', ['title' => 'Ôbar']) ?>

<?php $this->start('main_content') ?>

<!-- Connexion -->
<section class="connexion container-fluid">
	<?=$this->insert('default/connexion'); ?>
</section>

<!-- Présentation -->
<section class="presentation container-fluid">
	<?=$this->insert('default/presentation'); ?>
</section>

<!-- Dernier bar -->
<section class="last_bar">
	<?=$this->insert('default/lastBars'); ?>
</section>

<!-- Carte -->
<section class="map container-fluid">
	<?=$this->insert('default/map'); ?>
</section>

<!-- Inscription -->
<section id="subscribe container-fluid">
	<?=$this->insert('default/inscription'); ?>
</section>

<!-- Contact -->
<section id="contact container-fluid">
	<?=$this->insert('default/contact'); ?>
</section>

<?php $this->stop('main_content') ?>
