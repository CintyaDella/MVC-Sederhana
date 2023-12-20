<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // controller
        if (isset($url[0])) {
            $controllerFile = '../app/controllers/' . $url[0] . '.php';
            if (file_exists($controllerFile)) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        // method
        if (isset($url[1])) {
            $controllerClass = $this->controller;
            $controllerInstance = new $controllerClass();
            if (method_exists($controllerInstance, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        $controllerClass = $this->controller;
        $controllerInstance = new $controllerClass();
        call_user_func_array([$controllerInstance, $this->method], $this->params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }
}

spl_autoload_register(function($class) {
    require_once '../app/controllers/' . $class . '.php';
});

?>
