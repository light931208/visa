<?php
namespace app\controller;
use app\BaseController;
use think\facade\View;
use think\facade\Request;
use think\facade\Session;

/**
 * 登入模块
 */
class Login extends BaseController
{
    public function index()
    {
        return View::fetch();
    }

    public function doLogin()
    {
      
        $params      = Request::param();
        $loginModule = new \app\module\LoginModule();
        $res         = $loginModule->doLogin($params);
        return $res;
    }

    public function loginOut()
    {
        unset($_SESSION['admin_d']);
        uset($_SESSION['admin_name']);
    }


}