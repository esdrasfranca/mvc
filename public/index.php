<?php
require_once '../core/utils/includes.php';

use Core\Router;

$url = $_GET['url'] ?? '';
Router::dispatch($url);
