<h1>Créer un auteur</h1>

<form method="post" action="index.php" enctype="multipart/form-data">
	<fieldset>
		<div>
			<label for="name">Nom</label>
			<input type="text"
					id="name"
					name="name"
					value="">
			
		</div>

		<div>
			<label for="first_name">Prénom</label>
			<input type="text"
					id="first_name"
					name="first_name"
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
			<label for="photo">Photo</label>
			<input type="file"
					id="photo"
					name="photo"
					value="">
		</div>

		<div>
			<label for="datebirth">Date de naissance</label>
			<input type="text"
					id="datebirth"
					name="datebirth"
					placeholder="Format yyyy-mm-dd   Example : 2015-03-25"
					value="">
		</div>

		<div>
			<label for="datedeath">Date de déces</label>
			<input type="text"
					id="datedeath"
					name="datedeath"
					placeholder="Format yyyy-mm-dd   Example : 2015-03-25"
					value="">
		</div>

		<div>
			<label for="bio">Biographie</label>
			<textarea id="bio" name="bio"></textarea>
			
		</div>
	</fieldset>

	<input type="hidden" name="a" value="create">
	<input type="hidden" name="m" value="author">
		
	<div> <input type="submit" value="Enregistrer"> </div>
</form>