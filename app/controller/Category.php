<?php
namespace app\controller;
use think\facade\View;
use think\facade\Request;

class Category
{
    public function index()
    {
        $params         = Request::param();
        $CategoryModule = new  \app\module\CategoryModule();
		$list = $CategoryModule->index($params);
		View::assign([
			'list'  => $list,
		]);
        return View::fetch();
    }

    public function add()
    {
    	if (Request::isPost())
		{
			$params         = Request::param();
			$CategoryModule = new  \app\module\CategoryModule();
			$CategoryModule->add($params);
			return redirect('/category/add');
		}
        return View::fetch();
    }

    public function edit()
    {
		if (Request::isPost())
		{
			$params         = Request::param();
			$CategoryModule = new  \app\module\CategoryModule();
			$CategoryModule->edit($params);
			return redirect('/category/index');
		}
		$params         = Request::param();
		$CategoryModel  = new \app\model\CategoryModel();
		$categoryInfo   = $CategoryModel->where('id','=',$params['id'])->find();
		View::assign([
			'info'  => $categoryInfo,
		]);
        return View::fetch();
    }

    public function del()
    {
		$params         = Request::param();
		$CategoryModule = new  \app\module\CategoryModule();
		$CategoryModule->del($params);
		return redirect('/category/index');
    }
}