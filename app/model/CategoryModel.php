<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 11:20 AM
 */
namespace  app\model;
use think\Model;

class CategoryModel extends Model
{
	protected $table = 'category';

	public function getCreateTimeAttr($value)
	{
		return date('Y-m-d H:i:s', $value);
	}

	public function getUpdateTimeAttr($value)
	{
		return date('Y-m-d H:i:s', $value);
	}

}