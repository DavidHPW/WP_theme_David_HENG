<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbarSupportedContent">
	<a class="navbar-brand" href="#">Loge Mi</a>
		  <?php wp_nav_menu([
			  'theme_location' => 'header',
			  'container'	   => false,
			  'menu_class'	   => 'navbar-nav mr-auto'

	 	]) 
		?>
	</nav>

	<div class="container">