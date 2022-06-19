<?php

namespace app\module;

class AdminModule
{
    public function setPwd(array $params)
    {
        $AdminModel = new \app\model\AdminModel();
        $adminInfo  = $AdminModel->where('id','=',1)->find()->toArray();
        if($adminInfo['password'] != md5($params['oldPassword']))
        {
            return ['code'=>1,'msg'=>'旧密码不正确'];
        }    

        if($params['password'] != $params['repassword'])
        {
            return ['code'=>1,'msg'=>'确认密码不正确'];
        }
        $AdminModel->where('id','=',1)->update(['password'=>md5($params['password'])]);
        return ['code'=>0 , 'msg'=>'更新密码成功'];
    }
}