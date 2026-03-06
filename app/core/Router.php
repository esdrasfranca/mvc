<?php

require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../core/controllers/ErrorController.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/NoticiaController.php';

class Router
{
    public function dispatch($url)
    {
        $url = trim($url, '/');
        $parts = $url ? explode('/', $url) : [];

        $controllerName = $parts[0] ?? 'Home';
        $controllerName = ucfirst($controllerName) . 'Controller';

        if (class_exists($controllerName)) {

            $methodName = $parts[1] ?? 'index';
            $methodName = lcfirst($methodName);

            // Parâmetros adicionais a partir do terceiro segmento da URL
            $params = array_slice($parts, 2);

            if (method_exists($controllerName, $methodName)) {
                call_user_func_array([new $controllerName(), $methodName], $params);
            } else {
                // Método não encontrado
                $this->notFound();
            }
        } else {
            // Controlador não encontrado
            $this->notFound();
        }
    }

    private function notFound()
    {
        ErrorController::error404();
    }
}
