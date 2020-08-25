<?php

namespace AHT;

use AHT\Request;

use AHT\Router;

use AHT\Controllers\TasksController;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request\Request();
        $Router = new Router\Router();
        $Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {

        $name = ucfirst($this->request->controller);
        $newsName = str_replace("Controller", "", $name);
        $file = "AHT\\Controllers\\". $newsName . 'Controller';
        $controller = new $file();
        return $controller;
    }

}