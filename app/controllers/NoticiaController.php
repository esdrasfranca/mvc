<?php

namespace App\Controllers;

use App\Models\Noticia;
use Core\View;

class NoticiaController
{
    public function index()
    {
        $noticia = new Noticia();
        return View::render('noticia/index', ['noticias' => $noticia->getAll()]);
    }

    public function verNoticia($id)
    {
        $noticia = (new Noticia())->getById($id);

        if ($noticia) {
            return View::render('noticia/ver', ['noticia' => $noticia]);
        } else {
            // Redirecionar para a página de notícias se a notícia não for encontrada 
            header("Location: " . BASE_URL . "/noticia");
            exit();
        }
    }
}
