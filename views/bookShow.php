<h1>Détails du livre <?php echo $data['data']['title'] ?></h1>

<?php if ($_SESSION['valid']): ?>
	<ul>
		<li>
			<a href="?m=book&a=edit&book_id=<?php echo $data['data']['id'] ?>">Modifier</a>
		</li>
		<li>
			<a href="?m=book&a=delete&book_id=<?php echo $data['data']['id'] ?>">Supprimer</a>
		</li>
	</ul>
<?php endif ?>

<?php if ($data['data']['front_cover']): ?>
	<img src="<?php echo $data['data']['front_cover'] ?>" title="<?php echo $data['data']['title'] ?>" alt="Couverture du livre <?php echo $data['data']['title'] ?>">
<?php endif ?>

<ul>
	<?php if ($data['data']['authors']): ?>
		<li>Auteur(s) : <ul>
							<?php foreach ($data['data']['authors'] as $author): ?>
								<li><a href="?m=author&a=show&author_id=<?php echo $author['author_id'] ?>">
										<?php echo $author['name'] ?> <?php echo $author['first_name'] ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
		</li>
	<?php endif ?>

	<?php if ($data['data']['genre']): ?>
		<li>Genre : <a href="?m=genre&a=show&genre_id=<?php echo $data['data']['genre']['genre_id'] ?>">
							<?php echo $data['data']['genre']['genre_name'] ?>
					</a>
					
		</li>
	<?php endif ?>

	<?php if ($data['data']['editor']): ?>
		<li>&Eacute;diteur : <a href="?m=editor&a=show&editor_id=<?php echo $data['data']['editor_id'] ?>">
								<?php echo $data['data']['editor']['editor_name'] ?>
							</a>
		</li>
	<?php endif ?>

	<li>Nombre de pages : <?php echo $data['data']['npages'] ?></li>

	<li>Langue(s) : <?php echo $data['data']['language']['language_name'] ?></li>

	<li>N° ISBN : <?php echo $data['data']['isbn'] ?></li>

	<li>Rayonnage : <?php echo $data['data']['location']['location_name'] ?></li>

	<?php if ($data['data']['summary']): ?>
		<li>R&eacute;sum&eacute; : <?php echo $data['data']['summary'] ?></li>
	<?php endif ?>
</ul>