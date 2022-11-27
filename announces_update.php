<?php

use App\Controllers\announcesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new announcesController();
echo $controller->updateannounce();
?>

<p>Mise à jour d'une annonce</p>
<form method="post" action="announces_update.php" name ="announceUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="dateannounce ">Date au format dd-mm-yyyy :</label>
    <input type="text" name="dateannounce ">
    <br />
    <label for="citystart">ville de départ :</label>
    <input type="text" name="citystart">
    <br />
    <label for="cityend">ville de fin :</label>
    <input type="text" name="cityend">
    <br /><br>
    <input type="submit" value="Modifier l'annonce">
</form>

<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>