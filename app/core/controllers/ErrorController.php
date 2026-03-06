<?php

class ErrorController
{

    public static function error404()
    {
        http_response_code(404);
        require_once self::getView(404);
        exit;
    }

    public static function error500()
    {
        http_response_code(500);
        require_once self::getView(500);
        exit;
    }

    public static function error403()
    {
        http_response_code(403);
        require_once self::getView(403);
        exit;
    }

    private static function getView($code)
    {
        // View padrão para o código de erro
        $viewDefault = __DIR__ . '/../views/errors/' . $code . '.php';
        $view = $viewDefault;

        if (!empty(ERRORS_VIEWS[$code])) {
            $view = __DIR__ . '/../../views/' . ERRORS_VIEWS[$code] . '.php';

            if (!file_exists($view)) {
                // Se a view personalizada não existir, usar a view padrão
                $view = $viewDefault;
            }
        }

        return $view;
    }
}
