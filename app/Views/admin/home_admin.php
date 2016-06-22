<?php $this->layout('layout_admin', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!--                         PRESENTATION                        -->
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<div class="module" id="presentation">
		<div class="contenue">
			<?=$this->insert('admin/presentation');?>
			lolaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
		</div>
	</div>

	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!--                        LISTE DES BARS                       -->
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<div class="module" id="bar_list">
		<div class="contenue">
			<?=$this->insert('admin/bar_list');?>
		</div>
	</div>

	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!--                       AJOUTER DES BARS                      -->
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<div class="module" id="bar_add">
		<div class="contenue">
			<?=$this->insert('admin/bar_add');?>
		</div>
	</div>

	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!--                       CONTACT / MESSAGE                     -->
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<div class="module" id="message">
		<div class="contenue">
			<?=$this->insert('admin/message');?>
		</div>
	</div>

	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!--                         UTILISATEURS                        -->
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<div class="module" id="users">
		<div class="contenue">
			<?=$this->insert('admin/users');?>
		</div>
	</div>

	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!--                         NEWS LETTER                         -->
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<div class="module" id="news_letter">
		<div class="contenue">
			<?=$this->insert('admin/news_letter');?>
		</div>
	</div>

<?php $this->stop('main_content') ?>