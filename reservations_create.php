<?php

use App\Controllers\ReservationsController;
use App\Services\ReservationsService;
use App\Services\UsersService;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->createReservation();

$reservationsService = new ReservationsService();
$reservations = $reservationsService->getReservations();

$usersService = new UsersService();
$users = $usersService->getUsers();
?>

<p>Ajout d'une réservation</p>
<form method="post" action="reservations_create.php" name ="reservationCreateForm">
    <label for="author">Auteur :</label>
    <?php foreach ($users as $user): ?>
        <?php $userName = $user->getLastname(); ?>
        <input type="checkbox" name="users[]" value="<?php echo $user->getId(); ?>"><?php echo $userName; ?>
        <br />
    <?php endforeach; ?>
    <br />
    <label for="client">Client :</label>
    <?php foreach ($users as $user): ?>
        <?php $userName = $user->getLastname(); ?>
        <input type="checkbox" name="users[]" value="<?php echo $user->getId(); ?>"><?php echo $userName; ?>
        <br />
    <?php endforeach; ?>
    <br />
    <label for="rescitystart">Ville départ :</label>
    <input type="text" name="rescitystart">
    <br />
    <label for="rescityend">Ville arrivée :</label>
    <input type="text" name="rescityend">
    <br />
    <label for="dateres">Date de réservation au format dd-mm-yyyy :</label>
    <input type="text" name="dateres">
    <br />
    <input type="submit" value="Ajouter une réservation">
</form>
