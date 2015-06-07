<h1 class="content-title">Liste des éditeurs dont il y a des ouvrages dans la bibliothèque</h1>

<?php if ($_SESSION['valid']): ?>
	<div><p><a class="admin-link" href="?m=editor&a=create">Ajouter un éditeur</a></p></div>
<?php endif ?>

<ul class="content-list">
	<?php foreach ($data['data'] as $editor): ?>
		<li class="content-list-item">
			<a class="content-list-link" href="?a=show&m=editor&editor_id=<?php echo $editor['id'] ?>"><?php echo $editor['name'] ?></a>
			<?php if ($_SESSION['valid']): ?>
				<a class="admin-link" href="?m=editor&a=edit&editor_id=<?php echo $editor['id'] ?>">Modifier</a>
				<a class="admin-link" href="?m=editor&a=delete&editor_id=<?php echo $editor['id'] ?>">Supprimer</a>
			<?php endif ?>
		</li>
	<?php endforeach ?>
	
</ul>