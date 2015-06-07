<h1>Détails de l'auteur <?php echo $data['data']['first_name'] ?> <?php echo $data['data']['name'] ?></h1>

<?php if ($_SESSION['valid']): ?>
	<ul>
		<li>
			<a href="?m=author&a=edit&author_id=<?php echo $data['data']['id'] ?>">Modifier</a>
		</li>
		<li>
			<a href="?m=author&a=delete&author_id=<?php echo $data['data']['id'] ?>">Supprimer</a>
		</li>
	</ul>
<?php endif ?>

<?php if ($data['data']['photo']): ?>
	<img src="<?php echo $data['data']['photo'] ?>" title="<?php echo $data['data']['name'] ?> <?php echo $data['data']['first_name'] ?>" alt="Photo de <?php echo $data['data']['name'] ?> <?php echo $data['data']['first_name'] ?>">
<?php endif ?>

<ul>
	<li>Nom : <?php echo $data['data']['name'] ?></li>
	<li>Prénom : <?php echo $data['data']['first_name'] ?></li>
	<li>Biographie : <?php echo $data['data']['bio'] ?></li>
	<?php if ($data['data']['books']): ?>
		<li>Livre(s) de l'auteur disponibles dans la bibliothèque : <ul>
							<?php foreach ($data['data']['books'] as $book): ?>
								<li><a href="?m=book&a=show&book_id=<?php echo $book['id'] ?>">
										<?php echo $book['title'] ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
		</li>
	<?php endif ?>
</ul>