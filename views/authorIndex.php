<h1 class="content-title">Liste des auteurs</h1>

<?php if ($_SESSION['valid']): ?>
	<div><p><a class="admin-link" href="?m=author&a=create">Ajouter un auteur</a></p></div>
<?php endif ?>

<ul class="content-list">
	<?php foreach ($data['data'] as $author): ?>
		<li class="content-list-item">
			<a class="content-list-link" href="?a=show&m=author&author_id=<?php echo $author['id'] ?>"><?php echo $author['name'] ?> <?php echo $author['first_name'] ?></a>
			<?php if ($_SESSION['valid']): ?>
				<a class="admin-link" href="?m=author&a=edit&author_id=<?php echo $author['id'] ?>">Modifier</a>
				<a class="admin-link" href="?m=author&a=delete&author_id=<?php echo $author['id'] ?>">Supprimer</a>
			<?php endif ?>
		</li>
	<?php endforeach ?>
	
</ul>