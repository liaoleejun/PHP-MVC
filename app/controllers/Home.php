<?php

class Home
{
    public function index($name = '')
    {
        // echo $name;  // 通过 controller 传数据
        $user = $this->model('User'); // $user is the User model
        $user->name = $name;
//        echo $user->name; //打印出 User model 里面的值（通过 model 传数据）
        $this->view('home/index', ['name' => $user->name]); // User model 里面的值传到view（通过 view 传数据）
    }

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