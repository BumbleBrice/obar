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

<!--Profil user-->
<section id="users_profil" class="users_profil diagonal">
	<?=$this->insert('default/profilUsers'); ?>
</section>

<!--Slice mise à jour-->
<section id="about" class="about diagonal">
	<?=$this->insert('default/lastBars'); ?>
</section>

<!-- Carte -->
<section id="services" class="services bg-primary diagonal">
	<?=$this->insert('default/map'); ?>
</section>

<!-- Inscription -->
<section id="subs" class="subs diagonal">
	<?=$this->insert('default/inscription'); ?>
</section>

<!-- Contact -->
<section id="contact" class="contact diagonal">
    <?=$this->insert('default/contact', ['errors' => $errors, 'success' => $success]); ?>
</section>

<?php $this->stop('main_content') ?>
