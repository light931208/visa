<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 11:17 AM
 */
namespace app\module;

class ConfigModule
{
	public function index(array $params)
	{
		$update['name']          = $params['name'];
		$update['title']         = $params['title'];
		$update['keywords']      = $params['keywords'];
		$update['description']   = $params['description'];
		$update['copyright']     = $params['copyright'];
		$update['update_time']   = request()->time();
		$condition[]             = ['id','=',1];
		$ConfigModel             = new \app\model\ConfigModel();
		$res = $ConfigModel->where($condition)->update($update);
		if (empty($res))
		{
			exception('更新失败');
		}
	}
}