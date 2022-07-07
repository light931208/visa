<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 11:19 AM
 */
namespace app\module;

class ArticleModule
{
	public function index(array $params)
	{
		$ArticleModel = new \app\model\ArticleModel();
		$list = $ArticleModel->paginate();
		return $list;
	}

	public function add(array $params)
	{
		$CategoryModel = new \app\model\CategoryModel();
		$categoryInfo  = $CategoryModel->where('id','=',$params['category_id'])->find();
		$save['title']            = $params['title'];
		$save['desc']             = getDesc($params['article']);
		$save['cover']            = getImg($params['article']);
		$save['article']          = $params['article'];
		$save['create_time']      = time();
		$save['update_time']      = time();
		$save['is_show']          = $params['is_show'];
		$save['category_id']      = $params['category_id'];
		$save['category_name']    = $categoryInfo['name'];
		$ArticleModel    = new \app\model\ArticleModel();
		$res = $ArticleModel->save($save);
		if (empty($res))
		{
			exception('添加失败');
		}
	}

	public function edit(array $params)
	{
		$CategoryModel = new \app\model\CategoryModel();
		$categoryInfo  = $CategoryModel->where('id','=',$params['category_id'])->find();
		$update['title']            = $params['title'];
		$update['desc']             = getDesc($params['article']);
		$update['cover']            = getImg($params['article']);
		$update['article']          = $params['article'];
		$update['update_time']      = time();
		$update['is_show']          = $params['is_show'];
		$update['category_id']      = $params['category_id'];
		$update['category_name']    = $categoryInfo['name'];
		$ArticleModel    = new \app\model\ArticleModel();
		$res = $ArticleModel->where('id','=',$params['id'])->update($update);
		if (empty($res))
		{
			exception('编辑失败');
		}
	}

	public function del(array $params)
	{
		$ArticleModel    = new \app\model\ArticleModel();
		$res = $ArticleModel->where('id','=',$params['id'])->delete();
		if (empty($res))
		{
			exception('删除失败');
		}
	}
}