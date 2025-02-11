<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo $title; ?></title>
		
		<link rel="icon" href="<?php asset('icons/favicon.ico') ?>" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/360805e100.js" crossorigin="anonymous"></script>
		<link id="link" rel="stylesheet" href="<?php asset('css/index.css') ?>" />
		<?=$this->section('style') ?>
	</head>

	<body>
		<header>
			<?=$this->partial('site.header') ?>
		</header>

		<section class="content">
			<?=$this->section('content') ?>
		</section>

		<script src="<?php asset('js/index.js') ?>"></script>
		<?=$this->section('scripts') ?>
	</body>
</html>