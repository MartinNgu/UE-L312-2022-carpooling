<?php

use App\Controllers\AnnouncesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnouncesController();
echo $controller->createAnnounce();
?>

<p>Création d'une annonce</p>
<form method="post" action="announces_create.php" name ="announceCreateForm">
    <label for="name">Nom :</label>
    <input type="text" name="name">
    <br />
    <label for="car">Voiture :</label>
    <input type="text" name="car">
    <br />
    <label for="date">Date de départ au format dd-mm-yyyy :</label>
    <input type="text" name="date">
    <br />
    <label for="start">Ville de départ :</label>
    <input type="text" name="start">
    <br />
    <label for="end">Ville de la destination :</label>
    <input type="text" name="end">
    <br />
    <input type="submit" value="Créer une annonce">
</form>