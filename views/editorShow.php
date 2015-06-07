<h1>Détails de l'éditeur <?php echo $data['data']['name'] ?></h1>

<?php if ($_SESSION['valid']): ?>
	<ul>
		<li>
			<a href="?m=editor&a=edit&editor_id=<?php echo $data['data']['id'] ?>">Modifier</a>
		</li>
		<li>
			<a href="?m=editor&a=delete&editor_id=<?php echo $data['data']['id'] ?>">Supprimer</a>
		</li>
	</ul>
<?php endif ?>

<ul>
	<li>Logo : 
	<img src="<?php echo $data['data']['logo'] ?>" title="<?php echo $data['data']['name'] ?>" alt="Logo de l'éditeur <?php echo $data['data']['name'] ?>">
	</li>
	<li>Website : <a href="<?php echo $data['data']['website'] ?>"><?php echo $data['data']['website'] ?></a></li>
	<?php if ($data['data']['editors']): ?>
		<li>Livre(s) publiés par l'éditeur que nous possédons : <ul>
							<?php foreach ($data['data']['editors'] as $book): ?>
								<li><a href="?m=book&a=show&book_id=<?php echo $book['id'] ?>">
										<?php echo $book['title'] ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
		</li>
	<?php endif ?>
</ul>