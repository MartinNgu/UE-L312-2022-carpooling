<?php

use App\Controllers\AnnouncesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnouncesController();
echo $controller->getannounces();
?>

<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>
