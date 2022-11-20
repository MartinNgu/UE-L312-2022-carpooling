<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();
?>

<p>Ajout d'une voiture</p>
<form method="post" action="cars_create.php" name ="carCreateForm">
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <label for="powercar">Puissance moteur :</label>
    <input type="number" name="powercar">
    <br />
    <label for="birth">Date de sortie au format yyyy :</label>
    <input type="number" name="birth">
    <br />
    <input type="submit" value="Ajouter une voiture">
</form>
