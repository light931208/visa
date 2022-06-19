<?php
namespace app\controller;
use think\facade\View;
use think\facade\Request;

class Cate
{
    public function index()
    {
        $params     = Request::param();
        $CateModule = new  \app\module\CateModule();
        $list       = $CateModule->list($params);
        return View::fetch();
    }

    public function add()
    {

        return View::fetch();
    }

    public function edit()
    {
        return View::fetch();
    }

    public function del()
    {
        
    }
}