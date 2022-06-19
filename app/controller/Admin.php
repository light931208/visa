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

    public function setPwd()
    {
       
        return View::fetch();
    }

    public function doSetPwd()
    {
        $params      = Request::param();
        $AdminModule = new \app\module\AdminModule();
        $res         = $AdminModule->setPwd($params); 
        return $res;
    }
}