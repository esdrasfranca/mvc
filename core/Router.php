<?php

namespace Core;

use Core\Controllers\ErrorController;

class Router
{
    public static function dispatch($url)
    {
        $url = trim($url, '/');
        $parts = $url ? explode('/', $url) : [];

        $controllerName = 'App\\Controllers\\' . (ucfirst($parts[0] ?? 'Home')) . 'Controller';

        if (class_exists($controllerName)) {
            $methodName = $parts[1] ?? 'index';
            $methodName = lcfirst($methodName);

            // Parâmetros adicionais a partir do terceiro segmento da URL
            $params = array_slice($parts, 2);

            if (method_exists($controllerName, $methodName)) {
                call_user_func_array([new $controllerName(), $methodName], $params);
            } else {
                // Método não encontrado
                self::notFound();
            }
        } else {
            // Controlador não encontrado
            self::notFound();
        }
    }

    private static function notFound()
    {
        ErrorController::error404();
    }
}
