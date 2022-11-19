<?php

use App\Controllers\AnnouncesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnouncesController();
echo $controller->getAnnounce();
