<?php

namespace App\Controllers;

use Core\View;

class HomeController
{
    public function index()
    {

        dd("HomeController@index called");
        return View::render('home/index');
    }
}
