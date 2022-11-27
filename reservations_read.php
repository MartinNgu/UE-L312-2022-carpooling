<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->getReservations();
?>
<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>
