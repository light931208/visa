<?php
namespace app\controller;
use think\facade\Request;
use think\facade\View;

class Article
{
	public function index()
	{
		$params         = Request::param();
		$ArticleModule  = new  \app\module\ArticleModule();
		$list = $ArticleModule->index($params);
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
			$ArticleModule  = new  \app\module\ArticleModule();
			$ArticleModule->add($params);
			return redirect('/article/add');
		}
		$CategoryModel  = new \app\model\CategoryModel();
		$categoryInfo   = $CategoryModel->where('is_show','=',1)->order('sort','desc')->select()->toArray();
		View::assign([
			'cate'  => $categoryInfo,
		]);
		return View::fetch();
	}

	public function edit()
	{
		if (Request::isPost())
		{
			$params         = Request::param();
			$ArticleModule  = new  \app\module\ArticleModule();
			$ArticleModule->edit($params);
			return redirect('/article/index');
		}
		$params         = Request::param();
		$ArticleModel   = new \app\model\ArticleModel();
		$articleInfo    = $ArticleModel->where('id','=',$params['id'])->find();
		$CategoryModel  = new \app\model\CategoryModel();
		$categoryInfo   = $CategoryModel->where('is_show','=',1)->order('sort','desc')->select()->toArray();
		View::assign([
			'info'  => $articleInfo,
			'cate'  => $categoryInfo,

		]);
		return View::fetch();
	}

	public function del()
	{
		$params         = Request::param();
		$ArticleModule  = new  \app\module\ArticleModule();
		$ArticleModule->del($params);
		return redirect('/article/index');
	}
}