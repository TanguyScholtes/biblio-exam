<h1>Modifier un éditeur</h1>

<form method="post" action="index.php" enctype="multipart/form-data">
	<fieldset>
		<legend>Edition de <?php echo $data['data']['name']; ?></legend>
		<div>
			<label for="name">Nom</label>
			<input type="text"
					id="name"
					name="name"
					value="<?php echo $data['data']['name']; ?>">
			
		</div>

		<div>
			<label for="slug">Slug</label>
			<input type="text"
					id="slug"
					name="slug"
					value="<?php echo $data['data']['slug']; ?>">
		</div>

		<div>
			<label for="website">Website</label>
			<input type="text"
					id="website"
					name="website"
					value="<?php echo $data['data']['website']; ?>">
			
		</div>

		<div>
			<label for="logo">Logo</label>
			<?php if ($data['data']['logo'] !== NULL): ?>
				<div class="logo">
					<img src="<?php echo IMAGES_DIR . 'editors_logos/' . $data['data']['logo'] . '.jpg' ?>"
						 alt="<?php echo $data['data']['logo'] ?>">
				</div>
			<?php endif ?>
			<input type="file"
					id="logo"
					name="logo"
					value="<?php echo $data['data']['logo']; ?>">
		</div>
	</fieldset>

	<input type="hidden" name="a" value="update">
	<input type="hidden" name="m" value="editor">
	<input type="hidden" name="editor_id" value="<?php echo $data['data']['id']; ?>">
		
	<div> <input type="submit" value="Enregistrer"> </div>
</form>