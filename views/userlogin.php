<h1>Connexion</h1>

<form method="post" action="">
	<fieldset>
		<legend>Vos infos</legend>
		<div>
			<input type="text"
					id="email"
					name="email">
			<label for="email">Votre email</label>
		</div>

		<div>
			<input type="password"
					id="password"
					name="password">
			<label for="password">Votre mot de passe</label>
		</div>

		<input type="hidden" name="a" value="login">
		<input type="hidden" name="m" value="user">
		
		<div> <input type="submit" value="vérifier"> </div>
	</fieldset>
</form>