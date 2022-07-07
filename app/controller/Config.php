<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 11:16 AM
 */
namespace app\controller;
use app\validate\ConfigValidate;
use think\facade\Request;
use think\facade\View;

class Config
{

	public function index()
	{
		if (Request::isPost())
		{
			$params  = Request::param();
			validate(ConfigValidate::class)->scene('update')->check($params);;
		 	$ConfigModule = new \app\module\ConfigModule();
			$ConfigModule->index($params);
		}

		$ConfigModel = new \app\model\ConfigModel();
		$config      = $ConfigModel->where('id','=',1)->find()->toArray();
		View::assign([
			'config'  => $config,
		]);
		return View::fetch();
	}

}