<?php
/**
 * Created by PhpStorm.
 * User: sanpang
 * Date: 7/3/22
 * Time: 1:26 PM
 */


// 会员管理验证器
namespace app\validate;

use think\Validate;

class ConfigValidate extends Validate
{
	// 验证规则
	protected $rule = [
		'name'          =>'require',
		'title'         =>'require',
		'keywords'      =>'require',
		'description'   =>'require',
		'copyright'     =>'require',

	];

	// 错误信息
	protected $message = [
		'name.require'           => '网站名称不能为空',
		'title.require'          => '网站标题不能为空',
		'keywords.require'       => '网站关键词不能为空',
		'description.require'    => '网站描述不能为空',
		'copyright.number'       => '网站版权必须为数字',
	];

	// 验证场景
	protected $scene = [
		'update'        => ['name', 'title' , 'keywords' , 'description' , 'copyright'],
	];
}