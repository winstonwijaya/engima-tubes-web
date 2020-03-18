<?php

namespace App\Core;

use App\Controllers;
use Exception;

/**
 * Class App
 * @package App\Core
 */
class App {
    private $controller = 'Login';
    private $method = 'index';
    private $params = [];

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->parseURL();
        $this->getController();
        $this->getMethod();
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL()
    {
        if (isset($_GET['url']))
        {
            $url = rtrim($_GET['url']);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $this->params = explode('/', $url);
        }
    }

    private function getController()
    {
        try {
            if (!isset($this->params[0])) throw new Exception('class does not exists');

            $controllerPath = '../app/Controllers/' . ucfirst($this->params[0]) . '.php';
            if (!file_exists( $controllerPath)) throw new Exception('class does not exists');

            require_once '../app/Controllers/' . ucfirst($this->params[0]) . '.php';
            $className =  'App\Controllers\\' . $this->params[0];
            $this->controller = new $className;

            unset($this->params[0]);
        } catch (Exception $e)
        {
            require_once '../app/Controllers/Login.php';
            $this->controller = new Controllers\Login();
        }
    }

    private function getMethod()
    {
        if (isset($this->params[1]))
        {
            if (method_exists($this->controller, $this->params[1]))
            {
                $this->method = $this->params[1];
                unset($this->params[1]);
            }
        }
    }
}