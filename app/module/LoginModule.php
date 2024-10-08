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
			exception('账号密码错误');
        }
        $AdminModel->where('username','=',$params['username'])->update(['logintime'=>time()]);
        Session::set('admin_id', 1);
        Session::set('admin_name',$adminInfo['username']);
        return returnRes(1,'登入成功');
    }
}