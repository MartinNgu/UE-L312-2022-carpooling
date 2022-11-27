<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->getUsers();
?>
<br>
<form method="post" action="index.php">
	<input type="submit" value="revenir en arrière">
</form>
