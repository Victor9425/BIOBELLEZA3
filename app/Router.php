<?php
class Router {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if (!empty($url[0])) {
            $nombre = strtolower($url[0]);
            
            if ($nombre === 'productos' || $nombre === 'producto') {
                $controllerName = 'ProductoController';
            } elseif ($nombre === 'recetas' || $nombre === 'receta') {
                $controllerName = 'RecetaController';
            } elseif ($nombre === 'consejos' || $nombre === 'consejo') {
                $controllerName = 'ConsejosController';
            } elseif ($nombre === 'login' || $nombre === 'registro' || $nombre === 'auth') {
                $controllerName = 'AuthControllers'; // Coincide con AuthControllers.php
            } else {
                $controllerName = ucfirst($nombre) . 'Controller';
            }

            if (file_exists(__DIR__ . '/Controllers/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                if ($nombre === 'login') {
                    $this->method = 'login';
                } elseif ($nombre === 'registro') {
                    $this->method = 'registro';
                }
                unset($url[0]);
            }
        }

        require_once __DIR__ . '/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}