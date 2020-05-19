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
        if(request()->isPost()){
            $params = input('post.');

            if(!captcha_check($params['captcha'])){
                return json(array('code'=>0,'msg'=>'验证码不正确'));
            };
            $result = model('admin')->do_login($params);
            if($result){
                return json(array('code'=>200,'msg'=>'登陆成功'));
            }else{
                return json(array('code'=>0,'msg'=>'用户名或者密码不正确'));
            }
        }
        if(session('?admin_user')){
            $this->redirect('index/index');
        }
        //显示登陆页面
        return view('public/login');
    }
}
