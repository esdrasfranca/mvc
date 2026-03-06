<?php
require_once __DIR__ . '/../models/Noticia.php';

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
