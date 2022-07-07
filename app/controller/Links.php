<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 11:17 AM
 */
namespace app\controller;

use think\facade\Request;
use think\facade\View;

class Links
{
	public function index()
	{
		$params         = Request::param();
		$LinksModule    = new  \app\module\LinksModule();
		$list = $LinksModule->index($params);
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
			$LinksModule    = new  \app\module\LinksModule();
			$LinksModule->add($params);
			return redirect('/links/add');
		}
		return View::fetch();
	}

	public function edit()
	{
		if (Request::isPost())
		{
			$params         = Request::param();
			$LinksModule    = new  \app\module\LinksModule();
			$LinksModule->edit($params);
			return redirect('/links/index');
		}
		$params         = Request::param();
		$LinksModule    = new  \app\model\LinksModel();
		$linksInfo      = $LinksModule->where('id','=',$params['id'])->find();
		View::assign([
			'info'  => $linksInfo,
		]);
		return View::fetch();
	}

	public function del()
	{
		$params         = Request::param();
		$LinksModule    = new  \app\module\LinksModule();
		$LinksModule->del($params);
		return redirect('/links/index');
	}
}