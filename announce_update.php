<?php

use App\Controllers\AnnouncesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnouncesController();
echo $controller->updateAnnounce();
?>

<p>Mise à jour d'une annonce</p>
<form method="post" action="announces_update.php" name ="announceUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="nameannounce">Nom :</label>
    <input type="text" name="nameannounce">
    <br />
    <label for="car">Car :</label>
    <input type="text" name="car">
    <br />
    <label for="dateannounce">Date de départ au format dd-mm-yyyy :</label>
    <input type="text" name="dateannounce">
    <br />
    <label for="citystart">Ville de départ :</label>
    <input type="text" name="citystart">
    <br />
    <label for="cityend">Ville de la destination :</label>
    <input type="text" name="cityend">
    <br />
    <input type="submit" value="Modifier l'annonce">
</form>