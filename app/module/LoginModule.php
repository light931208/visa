<?php
namespace app\module;
use think\facade\Session;

class LoginModule
{
    public function doLogin(array $params)
    {
        $condition    = [];
        $condition[]  = ['username' , '=' , $params['username']];
        $AdminModel   = new \app\model\AdminModel();
        $adminInfo    = $AdminModel->where($condition)->find();
        if(empty($adminInfo)  || md5($params['password']) != $adminInfo['password'])
        {
            return ['code' => 1 , 'msg' => '账号密码错误'];
        }   
        $AdminModel->where('username','=',$params['username'])->update(['logintime'=>time()]);
        Session::set('admin_id', 1);
        return ['code' => 0 , 'msg' => '登入成功'];
    }
}