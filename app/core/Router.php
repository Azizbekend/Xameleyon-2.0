<?php

// use app\controllers\AccountController;


namespace app\core;

use app\core\View;

class Router
{

    // protected - это значит что переменная доступна только функции
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'app/config/routes.php';

        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    // Функция добавления
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    // Функция проверки нашего маршрута
    public function match()
    {
        // trim - удаляет символ
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    // Функция для запуска  роутера
    public function run()
    {
        if ($this->match()) {
            // ucfirst - делает первую букву строки с большой буквы
            $path = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            // class_exists - проверяет существует ли класс
            if (class_exists($path)) {
                // foreach ($this->params['action'] as $val) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
                // }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}

?>