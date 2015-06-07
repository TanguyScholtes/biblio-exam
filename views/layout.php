<!DOCTYPE html >
<html lang="<?php echo LANG; ?>">
	<head>
		<!-- pour protocole http -->
		<meta http-equiv="Content-Type" content="text/html"; />
		<meta charset="<?php echo CHARSET; ?>" />
		<meta name="description" content="<?php echo DESC; ?>" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Language" content="fr-BE" />

		<!-- "notice Dublin Core" de la ressource (plus d'info : http://openweb.eu.org/articles/dublin_core/) -->
		<meta name="DC.Language" content="fr" />
		<meta name="DC.Creator" content="SCHOLTES Tanguy" />
		<meta name="DC.Format" content="text/html" />
		
		<link rel="shortcut icon" type="image/png" href="./img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="./css/styles.css" media="screen" />
		<title><?php echo TITLE; ?></title>
	</head>
	<body>
		<div class="header-wrapper">
			<header class="header">
				<div class="branding">
					<span class="branding-title"><a class="branding-link" href="?a=index&m=book">ExLibris</a></span>
				</div>

				<nav class="menu">
					<h2 class="menu-title">Menu de navigation</h2>
					<ul class="menu-list">
						<li class="menu-list-item"><a class="menu-list-link" href="?a=index&m=book">Accueil</a></li>
						<li class="menu-list-item"><a class="menu-list-link" href="?a=index&m=book">Titre</a></li>
						<li class="menu-list-item"><a class="menu-list-link" href="?a=index&m=author">Auteurs</a></li>
						<li class="menu-list-item"><a class="menu-list-link" href="?a=index&m=genre">Genres</a></li>
						<li class="menu-list-item"><a class="menu-list-link" href="?a=index&m=editor">Éditeurs</a></li>
						<li class="menu-list-item">
							<?php if ($_SESSION['valid']): ?>
								<a class="menu-list-link" href="?a=logout&m=user">Déconnexion</a>
							<?php else: ?>
								<a class="menu-list-link" href="?a=login&m=user">Connexion</a>
							<?php endif ?>
						</li>
					</ul>
				</nav>
			</header>
		</div><!-- .header-wrapper -->

		<div class="content-wrapper">			
			<main class="content">
				<?php include($data['view']) ?>
			</main>	
		</div><!-- .content-wrapper -->

		<div class="footer-wrapper">
			<footer class="footer">
				<div class="legal">
					<p>Ex Libris - 2015</p>
					<p>Toutes les marques, oeuvres et images mentionnées ou utilisées ici appartiennent à leurs propriétaires respectifs.</p>
				</div>
				<div class="credits">
					<p>2015 - <a class="credits-link" href="#">Tanguy SCHOLTES</a>, 3i&egrave;me Infographie 2384</p>
				</div>
			</footer>
		</div><!-- .footer-wrapper -->

		<div class="script-wrapper">
			<script type="text/javascript" src="./js/jquery-1.11.2.js">Sorry, no JQuery for you. You should activate Javascript.</script>
			<script type="text/javascript">
				/*------- Same-width labels -------*/
				$(function(){
					var max_width = 0;
				    var labels = $('label');
				    labels.each(function() {
					    var width = $(this).width();
					    if(max_width < width){
					    	max_width = width;
					    }
				    });

				    labels.each(function() {
				    	console.log(this);
				        $(this).width(max_width);
				    });
				});
			</script>
		</div>

	</body>
</html>