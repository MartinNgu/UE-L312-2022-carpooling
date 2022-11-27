<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->getCars();
?>

<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>
