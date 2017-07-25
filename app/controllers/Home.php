<?php

class Home extends Controller
{
    public function index($name = '')
    {
//       echo $user->name; //打印出 User model 里面的值（通过 model 传数据）
        $this->view('home/index', ['name' => $user->name]); // User model 里面的值传到view（通过 view 传数据）
    }

    public function create($username = '', $email = '')
    {
        User::create([
            'username' => $username,
            'email' => $email
        ]);
    }
}