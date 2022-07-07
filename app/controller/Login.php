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
    	if (Request::isPost())
		{
			$params      = Request::param();
			$loginModule = new \app\module\LoginModule();
			$loginModule->doLogin($params);
			return redirect('/admin/index');
		}
        return View::fetch();
    }

    public function loginOut()
    {
    	Session::delete('admin_id');
		Session::delete('admin_name');
		header("location:/Login");
    }


}