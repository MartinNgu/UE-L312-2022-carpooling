<!DOCTYPE HTML>
<html>
  <head>
    <title>Carpooling</title>
    <meta charset="utf-8"/>
	<style>
		.fieldset{width:300px;border:1px solid black;float: left;}
        .button{padding: 15px 32px; text-align: center; font-size: 16px;}
	</style>
  </head>
<body>
	<div id="content">
        <h2>Carpooling</h2>
    		<fieldset class="fieldset">
			<legend><strong>Utilisateurs</strong></legend>
			<form method="post" action="users_create.php">
				<input class="button" type="submit" value="Créer un utilisateur">
			</form><br>
            <form method="post" action="users_read.php">
				<input class="button" type="submit" value="Lire la liste des utilisateur">
			</form><br>
            <form method="post" action="users_update.php">
				<input class="button" type="submit" value="Mettre à jour un utilisateur">
			</form><br>
            <form method="post" action="users_delete.php">
				<input class="button" type="submit" value="Supprimer un utilisateur">
			</form><br>
		</fieldset>

        <fieldset class="fieldset">
			<legend><strong>Voitures</strong></legend>
			<form method="post" action="cars_create.php">
				<input class="button" type="submit" value="Ajouter une voiture">
			</form><br>
            <form method="post" action="cars_read.php">
				<input class="button" type="submit" value="Lire la liste des voitures">
			</form><br>
            <form method="post" action="cars_update.php">
				<input class="button" type="submit" value="Mettre à jour une voiture">
			</form><br>
            <form method="post" action="cars_delete.php">
				<input class="button" type="submit" value="Supprimer une voiture">
			</form><br>
		</fieldset>

        <fieldset class="fieldset">
			<legend><strong>Annonces</strong></legend>
			<form method="post" action="announces_create.php">
				<input class="button" type="submit" value="Ajouter une annonce">
			</form><br>
            <form method="post" action="announces_read.php">
				<input class="button" type="submit" value="Lire la liste des annonces">
			</form><br>
            <form method="post" action="announces_update.php">
				<input class="button" type="submit" value="Mettre à jour une annonce">
			</form><br>
            <form method="post" action="announces_delete.php">
				<input class="button" type="submit" value="Supprimer une annonce">
			</form><br>
		</fieldset>

        <fieldset class="fieldset">
			<legend><strong>Réservations</strong></legend>
			<form method="post" action="reservation_create.php">
				<input class="button" type="submit" value="Ajouter une réservation">
			</form><br>
            <form method="post" action="reservation_read.php">
				<input class="button" type="submit" value="Lire la liste des réservations">
			</form><br>
            <form method="post" action="reservation_update.php">
				<input class="button" type="submit" value="Mettre à jour une réservation">
			</form><br>
            <form method="post" action="reservation_delete.php">
				<input class="button" type="submit" value="Supprimer une réservation">
			</form><br>
		</fieldset>
	</div>
</body>
</html>
