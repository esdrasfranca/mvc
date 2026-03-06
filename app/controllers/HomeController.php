<?php

namespace App\Controllers;

use Core\View;

class HomeController
{
    public function index()
    {

        return View::render('home/index');
    }
}
