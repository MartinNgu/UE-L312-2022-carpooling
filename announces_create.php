<?php

use App\Controllers\announcesController;
use App\Services\UsersService;
use App\Services\CarsService;

require __DIR__ . '/vendor/autoload.php';

$controller = new announcesController();
echo $controller->createannounce();

$usersService = new UsersService();
$users = $usersService->getUsers();

$carsService = new CarsService();
$cars = $carsService->getCars();
?>

<p>Création d'une annonce</p>
<form method="post" action="announces_create.php" name ="announceCreateForm">
    <label for="user">Nom de l'user:</label><br>
    <?php foreach ($users as $user): ?>
        <?php $userName = $user->getLastname(); ?>
        <input type="checkbox" name="users[]" value="<?php echo $user->getId(); ?>"><?php echo $userName; ?>
        <br />
    <?php endforeach; ?>
    <br />
    <label for="cars">Voiture(s) :</label><br>
    <?php foreach ($cars as $car): ?>
        <?php $carName = $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor(); ?>
        <input type="checkbox" name="cars[]" value="<?php echo $car->getId(); ?>"><?php echo $carName; ?>
        <br />
    <?php endforeach; ?>
    <br />
    <label for="dateannounce">Date au format dd-mm-yyyy :</label>
    <input type="text" name="dateannounce">
    <br />
    <label for="citystart">Ville de départ :</label>
    <input type="text" name="citystart">
    <br />
    <label for="cityend">Ville d'arrivé :</label>
    <input type="text" name="cityend">
    <br /><br>
    <input type="submit" value="Créer un utilisateur">
</form>

<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>

