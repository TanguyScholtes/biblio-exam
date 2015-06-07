<h1>Créer un éditeur</h1>

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
			<label for="slug">Slug</label>
			<input type="text"
					id="slug"
					name="slug"
					value="">
		</div>

		<div>
			<label for="website">Website</label>
			<input type="text"
					id="website"
					name="website"
					value="">
			
		</div>

		<div>
			<label for="logo">Logo</label>
			<input type="file"
					id="logo"
					name="logo"
					value="">
		</div>
	</fieldset>

	<input type="hidden" name="a" value="create">
	<input type="hidden" name="m" value="editor">
		
	<div> <input type="submit" value="Enregistrer"> </div>
</form>