<h1 class="content-title">Liste des genres de livres disponibles dans la bibliothèque</h1>

<?php if ($_SESSION['valid']): ?>
	<div><p><a class="admin-link" href="?m=genre&a=create">Ajouter un genre</a></p></div>
<?php endif ?>

<ul class="content-list">
	<?php foreach ($data['data'] as $genre): ?>
		<li class="content-list-item">
			<a class="content-list-link" href="?a=show&m=genre&genre_id=<?php echo $genre['id'] ?>"><?php echo $genre['name'] ?></a>
			<?php if ($_SESSION['valid']): ?>
				<a class="admin-link" href="?m=genre&a=edit&genre_id=<?php echo $genre['id'] ?>">Modifier</a>
				<a class="admin-link" href="?m=genre&a=delete&genre_id=<?php echo $genre['id'] ?>">Supprimer</a>
			<?php endif ?>
		</li>
	<?php endforeach ?>

	
</ul>