<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 11:18 AM
 */
namespace app\module;

class LinksModule
{

	public function index(array $params)
	{
		$LinksModel = new \app\model\LinksModel();
		$list = $LinksModel->order('sort','desc')->paginate();
		return $list;
	}

	public function add(array $params)
	{
		$save['name']            = $params['name'];
		$save['is_show']         = $params['is_show'];
		$save['url']             = $params['url'];
		$save['sort']            = $params['sort'];
		$save['create_time']     = time();
		$save['update_time']     = time();
		$LinksModel    = new \app\model\LinksModel();
		$res = $LinksModel->save($save);
		if (empty($res))
		{
			exception('添加失败');
		}
	}

	public function edit(array $params)
	{
		$update['name']            = $params['name'];
		$update['is_show']         = $params['is_show'];
		$update['url']             = $params['url'];
		$update['sort']            = $params['sort'];
		$update['create_time']     = time();
		$update['update_time']     = time();
		$LinksModel    = new \app\model\LinksModel();
		$res = $LinksModel->where('id','=',$params['id'])->update($update);
		if (empty($res))
		{
			exception('编辑失败');
		}
	}

	public function del(array $params)
	{
		$LinksModel    = new \app\model\LinksModel();
		$res = $LinksModel->where('id','=',$params['id'])->delete();
		if (empty($res))
		{
			exception('删除失败');
		}
	}
}