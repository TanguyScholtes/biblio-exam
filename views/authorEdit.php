<h1>Modifier un auteur</h1>

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
			<label for="first_name">Prénom</label>
			<input type="text"
					id="first_name"
					name="first_name"
					value="<?php echo $data['data']['first_name']; ?>">
			
		</div>

		<div>
			<label for="slug">Slug</label>
			<input type="text"
					id="slug"
					name="slug"
					value="<?php echo $data['data']['slug']; ?>">
		</div>

		<div>
			<label for="photo">Photo</label>
			<?php if ($data['data']['photo'] !== NULL): ?>
				<div class="photo">
					<img src="<?php echo IMAGES_DIR . 'authors_photos/' . $data['data']['photo'] . '.jpg' ?>"
						 alt="<?php echo $data['data']['photo'] ?>">
				</div>
			<?php endif ?>
			<input type="file"
					id="photo"
					name="photo"
					value="<?php echo $data['data']['photo']; ?>">
		</div>

		<div>
			<label for="datebirth">Date de naissance</label>
			<input type="text"
					id="datebirth"
					name="datebirth"
					placeholder="Format yyyy-mm-dd   Example : 2015-03-25"
					value="<?php echo $data['data']['datebirth']; ?>">
		</div>

		<div>
			<label for="datedeath">Date de déces</label>
			<input type="text"
					id="datedeath"
					name="datedeath"
					placeholder="Format yyyy-mm-dd   Example : 2015-03-25"
					value="<?php echo $data['data']['datedeath']; ?>">
		</div>

		<div>
			<label for="bio">Biographie</label>
			<textarea id="bio" name="bio"><?php echo $data['data']['bio']; ?></textarea>
		</div>
	</fieldset>

	<input type="hidden" name="a" value="update">
	<input type="hidden" name="m" value="author">
	<input type="hidden" name="author_id" value="<?php echo $data['data']['id']; ?>">
		
	<div> <input type="submit" value="Enregistrer"> </div>
</form>