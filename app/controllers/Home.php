<?php

class Home extends Controller
{
    public function index($name = '')
    {
        // echo $name;  // 通过 controller 传数据
        $user = $this->model('User'); // $user is the User model
        $user->name = $name;
//        echo $user->name; //打印出 User model 里面的值（通过 model 传数据）
        $this->view('home/index', ['name' => $user->name]); // User model 里面的值传到view（通过 view 传数据）
    }
}