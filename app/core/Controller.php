<?php

class Controller
{
    public function model($model)
    {
        require_once dirname(__DIR__) . '/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data =[])
    {
        require_once dirname(__DIR__) . '/views/' . $view . '.php';
        // require_once 会先处理一道吧，就相当于 echo 吧
    }
}