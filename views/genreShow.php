<h1>Détails du genre <?php echo $data['data']['name'] ?></h1>

<?php if ($_SESSION['valid']): ?>
	<ul>
		<li>
			<a href="?m=genre&a=edit&genre_id=<?php echo $data['data']['id'] ?>">Modifier</a>
		</li>
		<li>
			<a href="?m=genre&a=delete&genre_id=<?php echo $data['data']['id'] ?>">Supprimer</a>
		</li>
	</ul>
<?php endif ?>

<ul>
	<li>Logo :
		<img src="<?php echo $data['data']['logo'] ?>" title="<?php echo $data['data']['name'] ?>" alt="Logo du genre <?php echo $data['data']['name'] ?>">
	</li>
	<?php if ($data['data']['books']): ?>
		<li>Livres(s) du genre dans la bibliothèque : <ul>
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