<?php
require_once '../app/core/Router.php';
require_once '../app/config/app.php';

$url = $_GET['url'] ?? '';

$router = new Router();
$router->dispatch($url);
