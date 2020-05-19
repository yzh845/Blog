<?php

namespace app\admin\controller;

use think\Request;
use think\Controller;
class Login extends Init{
    function _initialize()
    {
        parent::_initialize();
    }


    public function login(){
        //登陆验证
        if (request()->isPost()){
            $params = input('post.');
        }

        //显示登陆页面
        return view('public/login');
    }
}
