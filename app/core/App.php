<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists(dirname(__DIR__) . '/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once dirname(__DIR__) . '/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

        /*传数组过去，而不是传单个参数*/
//        $foo = $this->controller;
//        $bar = $this->method;
//        $foo->$bar($this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['uuu'])) {
            return $url = explode('/',filter_var(rtrim($_GET['uuu'], '/'), FILTER_SANITIZE_URL));
        }
    }
}