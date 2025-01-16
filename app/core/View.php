<?php

namespace app\core;

class View
{

    public $path;
    public $route;
    public $layout = 'default';

    // Для данного проекта/ В скелете паттерная не участвуют
    public $linksPage;
    public $headFoot;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];

        $this->linksPage = $route['action'];
        $this->headFoot = $route['controller'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);

        if ($this->headFoot == 'profile') {
            $panelWin = $this->linksPage;
            $path = 'app/views/' . $this->headFoot . '/' . $this->headFoot . '.php';
        } else {
            $path = 'app/views/' . $this->path . '.php';
        }
        $pannelActive = $this->linksPage;

        if (file_exists($path)) {
            ob_start();
            require $path;

            $content = ob_get_clean();
            // Для управления навигациями меню
            $linksPage = $this->linksPage;
            // Для добавления или удаления header и добавления отступа в footer личном кабинете
            $headFoot = $this->headFoot;

            require 'app/views/layouts/' . $this->layout . '.php';

        } else {
            echo "Вид не найден: " . $this->path;
        }
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
    }

    public function messeng($status, $messege)
    {
        // Сюда передаются данные, которые должны будут отображаться типо ошибки или не правильное заполнение формы
    }
}

?>