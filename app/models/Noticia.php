<?php

namespace App\Models;

class Noticia
{

    public function getAll()
    {
        // Simulate fetching noticias from a database
        return [
            ['id' => 1, 'title' => 'Noticia 1'],
            ['id' => 2, 'title' => 'Noticia 2'],
            ['id' => 3, 'title' => 'Noticia 3'],
        ];
    }

    public function getById($id)
    {
        // Simulate fetching a single noticia by ID from a database
        $noticias = $this->getAll();
        foreach ($noticias as $noticia) {
            if ($noticia['id'] == $id) {
                return $noticia;
            }
        }
        return null; // Not found
    }
}
