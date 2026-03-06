<?php
require_once '../vendor/autoload.php';

use Core\Router;

require_once '../app/config/app.php';

$url = $_GET['url'] ?? '';
Router::dispatch($url);
