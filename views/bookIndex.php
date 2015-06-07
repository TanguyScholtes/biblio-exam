<h1 class="content-title">Liste des livres disponibles</h1>

<?php if ($_SESSION['valid']): ?>
	<div><p><a class="admin-link" href="?m=book&a=create">Ajouter un livre</a>
<?php endif ?>

<ul class="content-list">
	<?php foreach ($data['data'] as $book): ?>
		<li class="content-list-item">
			<a class="content-list-link" href="?a=show&m=book&book_id=<?php echo $book['id'] ?>">
				<?php echo $book['title'] ?>
			</a>

			<?php if ($_SESSION['valid']): ?>
				<a class="admin-link" href="?m=book&a=edit&book_id=<?php echo $book['id'] ?>">Modifier</a>
				<a class="admin-link" href="?m=book&a=delete&book_id=<?php echo $book['id'] ?>">Supprimer</a>
			<?php endif ?>
		</li>
	<?php endforeach ?>
</ul>