<?php
namespace app\module;

class CategoryModule
{

    public function index(array $params)
    {
		$CategoryModel = new \app\model\CategoryModel();
		$list = $CategoryModel->order('sort','desc')->paginate();
		return $list;
    }
    
    public function add(array $params)
    {
		$save['name']            = $params['name'];
		$save['is_show']         = $params['is_show'];
		$save['create_time']     = time();
		$save['update_time']     = time();
		$save['sort']            = $params['sort'];
		$save['desc']            = $params['desc'];
		$save['seo_title']       = $params['seo_title'];
		$save['seo_keyword']     = $params['seo_keyword'];
		$save['seo_description'] = $params['seo_description'];
		$CategoryModel    = new \app\model\CategoryModel();
		$res = $CategoryModel->save($save);
		if (empty($res))
		{
			exception('添加失败');
		}
	}

    public function edit(array $params)
    {
		$update['name']            = $params['name'];
		$update['is_show']         = $params['is_show'];
		$update['create_time']     = time();
		$update['update_time']     = time();
		$update['sort']            = $params['sort'];
		$update['desc']            = $params['desc'];
		$update['seo_title']       = $params['seo_title'];
		$update['seo_keyword']     = $params['seo_keyword'];
		$update['seo_description'] = $params['seo_description'];
		$CategoryModel    = new \app\model\CategoryModel();
		$res = $CategoryModel->where('id','=',$params['id'])->update($update);
		if (empty($res))
		{
			exception('编辑失败');
		}
    }

    public function del(array $params)
    {
		$CategoryModel    = new \app\model\CategoryModel();
		$res = $CategoryModel->where('id','=',$params['id'])->delete();
		if (empty($res))
		{
			exception('删除失败');
		}
	}
}