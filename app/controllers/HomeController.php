<?php

require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../models/Usuario.php';

class HomeController
{
    public function index()
    {
        $usuario = new Usuario();
        return View::render('home/index', ['users' => $usuario->getAll(), 'title' => 'Home']);
    }

    public function sobre()
    {
        echo "Página sobre nós";
    }
}
