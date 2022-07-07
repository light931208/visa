<?php
namespace app\controller;
use think\facade\View;
use think\facade\Request;

class Admin extends Common
{
    public function index()
    {
        return View::fetch();
    }

    public function setpwd()
    {
       if (Request::isPost())
	   {
		   $params      = Request::param();
		   $AdminModule = new \app\module\AdminModule();
		   $AdminModule->setPwd($params);
		   return redirect('/admin/setpwd');
	   }
       return View::fetch();
    }


    public function welcome()
	{
		return View::fetch();
	}

}