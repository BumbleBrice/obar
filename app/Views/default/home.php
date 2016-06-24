<?php $this->layout('layout', ['title' => 'Ô Bar | Bordeaux']) ?>

<?php $this->start('main_content') ?>

<!-- Connexion  -->
<section class="connexion container-fluid">
	<!--?$this->insert('default/connexion'); ?-->
</section>

<!-- Présentation -->
<header id="top" class="header">
	<?=$this->insert('default/presentation'); ?>
</header>

<!--Slice mise à jour-->
<section id="about" class="about">
	<?=$this->insert('default/lastBars'); ?>
</section>

<!-- Carte -->
<section id="services" class="services bg-primary">
	<?=$this->insert('default/map'); ?>
</section>

<!-- Inscription -->
<section id="subs" class="subs">
	<?=$this->insert('default/inscription'); ?>
</section>

<!-- Contact -->
<section id="contact" class="contact">
    <?=$this->insert('default/contact'); ?>
</section>

<?php $this->stop('main_content') ?>
