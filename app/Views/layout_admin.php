<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_admin.css') ?>">
	<script rel="stylesheet" href="<?= $this->assetUrl('js/script.js') ?>"></script>
	<script rel="stylesheet" href="<?= $this->assetUrl('js/jquery.easing.1.3.js') ?>"></script>

</head>
<body>
	<div class="container ">
		<section class="wrapper"><?= $this->section('main_content') ?></section>
	</div>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/script.js"></script>
</body>
</html>