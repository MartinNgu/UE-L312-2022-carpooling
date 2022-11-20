<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservation();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations_update.php" name ="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="author">Auteur :</label>
    <input type="text" name="author">
    <br />
    <label for="client">Client :</label>
    <input type="text" name="client">
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
    <input type="submit" value="Modifier la réservation">
</form>
