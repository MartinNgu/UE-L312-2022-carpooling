<?php

use App\Controllers\AnnouncesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnouncesController();
echo $controller->deleteAnnounce();
?>

<p>Supression d'un utilisateur</p>
<form method="post" action="announces_delete.php" name ="announceDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>