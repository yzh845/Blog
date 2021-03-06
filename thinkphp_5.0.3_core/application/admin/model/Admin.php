<?php
/**
 * Created by PhpStorm.
 * User: 22258
 * Date: 2020/5/19
 * Time: 17:16
 */
namespace app\admin\model;

use think\Model;
class Admin extends Model{

    //继承父类模板
    function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }
    function do_login($params){
        if (empty($params['username'])){
            return false;
        }
        if (empty($params['password'])){
            return false;
        }
        $admin_user = $this->where('username',$params['username'])->find();
        if(!$admin_user) {
            return FALSE;
        }
        $admin_user = $admin_user->toArray();
        if($admin_user['password'] !== strtolower(md5($params['password']))) {
            return FALSE;
        }
        session('admin_user',$admin_user);
        return $admin_user;
    }

    function edit($params){
        $result = $this->isUpdate(true)->allowField(true)->save($params);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}