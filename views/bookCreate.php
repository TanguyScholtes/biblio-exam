<h1>Créer un livre</h1>

<form method="post" action="index.php" enctype="multipart/form-data">
	<fieldset>
		<div>
			<label for="title">Titre</label>
			<input type="text"
					id="title"
					name="title"
					value="">
			
		</div>

		<div>
			<label for="slug">Slug</label>
			<input type="text"
					id="slug"
					name="slug"
					value="">
		</div>

		<div>
			<label for="title">Auteur(s)</label>
			<select multiple size="10" name="authors[]">
				<?php foreach ($data['data']['allAuthors'] as $author): ?>
					<option value="<?php echo $author['id'] ?>">
						<?php echo $author['first_name'] . ' ' . $author['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">Genre</label>
			<select name="genre">
				<?php foreach ($data['data']['allGenres'] as $genre): ?>
					<option value="<?php echo $genre['id'] ?>">
						<?php echo $genre['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">Éditeur</label>
			<select  name="editor">
				<?php foreach ($data['data']['allEditors'] as $editor): ?>
					<option value="<?php echo $editor['id'] ?>">
						<?php echo $editor['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="datepub">Date de publication</label>
			<input type="text"
					id="datepub"
					name="datepub"
					placeholder="Format yyyy-mm-dd   Example : 2015-03-25"
					value="">
		</div>

		<div>
			<label for="title">Langue</label>
			<select  name="language">
				<?php foreach ($data['data']['allLanguages'] as $language): ?>
					<option value="<?php echo $language['id'] ?>">
						<?php echo $language['full_name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">ISBN</label>
			<input type="text"
					id="isbn"
					name="isbn"
					value="">
		</div>
		<div>
			<label for="title">Nombre de pages</label>
			<input type="text"
					id="npages"
					name="npages"
					value="">
		</div>

		<div>
			<label for="title">Lieu de rangement</label>
			<select name="location">
				<?php foreach ($data['data']['allLocations'] as $location): ?>
					<option value="<?php echo $location['id'] ?>">
						<?php echo $location['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">Résumé</label>
			<textarea id="summary" name="summary"></textarea>
		</div>
	</fieldset>
	<fieldset>
		<legend>Edition de l'image</legend>
		<div>
			<input type="file" name="front_cover" value="">
		</div>

		<input type="hidden" name="a" value="create">
		<input type="hidden" name="m" value="book">
		
	</fieldset>
	<div> <input type="submit" value="Enregistrer"> </div>
</form>