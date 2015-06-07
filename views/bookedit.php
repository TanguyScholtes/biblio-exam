<h1>Modifier un livre</h1>

<form method="post" action="index.php" enctype="multipart/form-data">
	<fieldset>
		<legend>Edition de <?php echo $data['data']['title']; ?></legend>
		<div>
			<label for="title">Titre</label>
			<input type="text"
					id="title"
					name="title"
					value="<?php echo $data['data']['title']; ?>">
			
		</div>

		<div>
			<label for="slug">Slug</label>
			<input type="text"
					id="slug"
					name="slug"
					value="<?php echo $data['data']['slug']; ?>">
		</div>

		<div>
			<label for="title">Auteur(s)</label>
			<select multiple size="10" name="authors[]">
				<?php $ids = []; foreach ($data['data']['authors'] as $bookAuthor): ?>
					<?php $ids[] = $bookAuthor['author_id']; ?>
				<?php endforeach ?>
				<?php foreach ($data['data']['allAuthors'] as $author): ?>
					<option <?php echo in_array($author['id'], $ids) ? 'selected' : ''; ?>
							value="<?php echo $author['id'] ?>">
						<?php echo $author['first_name'] . ' ' . $author['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">Genre</label>
			<select name="genre">
				<?php $ids = []; foreach ($data['data']['genre'] as $genreName): ?>
					<?php $ids[] = $genreName['genre_id']; ?>
				<?php endforeach ?>
				<?php foreach ($data['data']['allGenres'] as $genre): ?>
					<option <?php echo in_array($genre['id'], $ids) ? 'selected' : ''; ?>
							value="<?php echo $genre['id'] ?>">
						<?php echo $genre['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">Éditeur</label>
			<select  name="editor">
				<?php $ids = []; foreach ($data['data']['editor'] as $editorName): ?>
					<?php $ids[] = $editorName['editor_id']; ?>
				<?php endforeach ?>
				<?php foreach ($data['data']['allEditors'] as $editor): ?>
					<option <?php echo in_array($editor['id'], $ids) ? 'selected' : ''; ?>
							value="<?php echo $editor['id'] ?>">
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
					value="<?php echo $data['data']['datepub']; ?>">
		</div>

		<div>
			<label for="title">Langue</label>
			<select  name="language">
				<?php $ids = []; foreach ($data['data']['language'] as $languageName): ?>
					<?php $ids[] = $languageName['language_id']; ?>
				<?php endforeach ?>
				<?php foreach ($data['data']['allLanguages'] as $language): ?>
					<option <?php echo in_array($language['id'], $ids) ? 'selected' : ''; ?>
							value="<?php echo $language['id'] ?>">
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
					value="<?php echo $data['data']['isbn']; ?>">
		</div>
		<div>
			<label for="title">Nombre de pages</label>
			<input type="text"
					id="npages"
					name="npages"
					value="<?php echo $data['data']['npages']; ?>">
		</div>

		<div>
			<label for="title">Lieu de rangement</label>
			<select name="location">
				<?php $ids = []; foreach ($data['data']['location'] as $locationName): ?>
					<?php $ids[] = $locationName['location_id']; ?>
				<?php endforeach ?>
				<?php foreach ($data['data']['allLocations'] as $location): ?>
					<option <?php echo in_array($location['id'], $ids) ? 'selected' : ''; ?>
							value="<?php echo $location['id'] ?>">
						<?php echo $location['name']; ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>

		<div>
			<label for="title">Résumé</label>
			<textarea id="summary" name="summary"><?php echo $data['data']['summary']; ?></textarea>			
		</div>
	</fieldset>
	<fieldset>
		<legend>Edition de l'image</legend>
		<div>
			<?php if ($data['data']['front_cover'] !== NULL): ?>
				<div class="cover">
					<img src="<?php echo IMAGES_DIR . 'books_covers/' . $data['data']['front_cover'] . '.jpg' ?>"
						 alt="<?php echo $data['data']['title'] ?>">
				</div>
			<?php endif ?>

			<input type="file" name="front_cover" value="">
			
		</div>

		<input type="hidden" name="a" value="update">
		<input type="hidden" name="m" value="book">
		<input type="hidden" name="book_id" value="<?php echo $data['data']['id']; ?>">
		
	</fieldset>
	<div> <input type="submit" value="Enregistrer"> </div>
</form>