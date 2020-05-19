<?php
namespace app\admin\controller;

class Index extends Init{
    //继承父类
    function _initialize()
    {
        parent::_initialize();
    }

    //首页
    function index(){
        return view('index');
    }
    //欢迎页面
    function home(){
        return view('home');
    }
}