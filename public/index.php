<?php
require_once '../app/config/includes.php';

use Core\Router;

$url = $_GET['url'] ?? '';
Router::dispatch($url);
