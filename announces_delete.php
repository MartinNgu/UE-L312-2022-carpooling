<?php

use App\Controllers\announcesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new announcesController();
echo $controller->deleteannounce();
?>

<p>Supression d'un utilisateur</p>
<form method="post" action="announces_delete.php" name ="announceDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>

<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>