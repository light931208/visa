<?php
namespace app\controller;
use think\App;
use think\facade\Request;
use think\facade\View;

use app\BaseController;

class Index extends BaseController
{
	public $global = [];

	public function __construct(App $app)
	{
		parent::__construct($app);

		$this->global['type']  = [
			'visa'	            => 1, //签证
			'airportCustoms'    => 2, //保关
			'renewal'           => 3, //续期
			'express'           => 4, //快递
			'sign'              => 5, //公签
			'borrowTicket'      => 6, //回程机票
			'business'          => 7, //小众业务
			'rePassport'        => 8,//ECC清关
			'phoneGeneration'   => 9,//话费代充
			'news'              => 10,//新闻
			'security'          => 2, //保关
			'work'              => 5,

		];

		$ConfigModel = new \app\model\ConfigModel();
		$this->global['config']   = $ConfigModel->where('id','=',1)->find()->toArray();
		$CategoryModel = new \app\model\CategoryModel();
		$this->global['category'] = $CategoryModel->where('is_show','=',1)->order('sort','desc')->limit(5)->select()->toArray();
		$LinksModel = new \app\model\LinksModel();
		$this->global['links']  = $LinksModel->where('is_show','=',1)->order('sort','desc')->select()->toArray();
	}

	public function index()
    {
		$ArticleModel  = new \app\model\ArticleModel();
		$article       = $ArticleModel->where('is_show','=',1)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
		]);
		return View::fetch();
    }


    public function visa()
	{
		$type = $this->global['type']['visa'];
		$more = [
			'notice_img'     => 'c_tit_1.png',
			'notice_img_two' => 'c_tit_1_zh.png',
			'show_img'       => 'c_tab_1.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '中国对菲律宾现非免签国，华商为您提供的签证为菲律宾全境极简手续签证，无需各种抵押，无需填写繁琐的材料。办理签证时间最快3天。',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch();

	}

	public function airportCustoms()
	{
		$type = $this->global['type']['airportCustoms'];
		$more = [
			'notice_img'     => 'c_tit_5.png',
			'notice_img_two' => 'c_tit_5_zh.png',
			'show_img'       => 'c_tab_5.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			保关业务办理7年来，没有任何一个人被遣返，被拉黑，大部分我们办理的保关都是进入机场把您安全带出关的。 花小钱，买安心，不要赌运气。顺利过关才是重中之重。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '机场保关 直接与机场内部合作  100%出关 让你花小钱得安心',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');

	}


	public function renewal()
	{
		$type = $this->global['type']['renewal'];
		$more = [
			'notice_img'     => 'c_tit_2.png',
			'notice_img_two' => 'c_tit_2_zh.png',
			'show_img'       => 'c_tab_2.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			旅游签到期后如需继续留在菲律宾，只需一个电话，我们上门取件，办理完毕后，上门送件。无需出门也可享受续签服务。如果您的签证过期未及时续签，也可以联系我们办理。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}


	public function express()
	{
		$type = $this->global['type']['express'];
		$more = [
			'notice_img'     => 'c_tit_3.png',
			'notice_img_two' => 'c_tit_3_zh.png',
			'show_img'       => 'c_tab_3.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			需要邮寄东西到菲律宾，或者邮寄到中国。我们长期在中国厦门和中国泉州设立办事处，通过海运空运的方式邮寄到马尼拉，再免费送货到您的手中。（敏感物品需联系客服）
        		',
			'desc_one'		 => 'express1.png',
			'desc_two'		 => 'express2.png',
			'desc_three'     => 'express3.png',
			'tips'			 => '',

		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}


	public function sign()
	{
		$type = $this->global['type']['express'];
		$more = [
			'notice_img'     => 'c_tit_4.png',
			'notice_img_two' => 'c_tit_4_zh.png',
			'show_img'       => 'c_tab_4.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			华商长期和菲律宾50家以上的企业有业务往来，如果您需要找一个在菲律宾的工作，我们可以在10分钟内帮您搞定，最快当天办理入职入住。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '无限次往返菲律宾  工签是你最好的选择',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}

	public function borrowTicket()
	{
		$type = $this->global['type']['borrowTicket'];
		$more = [
			'notice_img'     => 'c_tit_6.png',
			'notice_img_two' => 'c_tit_6_zh.png',
			'show_img'       => 'c_tab_6.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			从中国机场做飞机时会需要回程的票，在菲律宾机场也需要回去的票，那么您现在可以花更小的钱，就可以有一个真实的回程票。一切我们帮你搞定。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '国内机场要菲律宾回程票？现在无需担心 我们给你出具英文机票 比您退票更便宜。',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}

	public function security()
	{
		$type = $this->global['type']['security'];
		$more = [
			'notice_img'     => 'c_tit_5.png',
			'notice_img_two' => 'c_tit_5_zh.png',
			'show_img'       => 'c_tab_5.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			保关业务办理7年来，没有任何一个人被遣返，被拉黑，大部分我们办理的保关都是进入机场把您安全带出关的。 花小钱，买安心，不要赌运气。顺利过关才是重中之重。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '机场保关 直接与机场内部合作  100%出关 让你花小钱得安心',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}


	public function phoneGeneration()
	{
		$type = $this->global['type']['phoneGeneration'];
		$more = [
			'notice_img'     => 'c_tit_7.png',
			'notice_img_two' => 'c_tit_7_zh.png',
			'show_img'       => 'c_tab_7.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			如果您初到菲律宾，对充值不熟？ 还是您在国内休假，无法给手机号码充值，现在无需出门，也无需发送繁琐的英文字母去包月或充值，华商一切给你搞定。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '注：会根据汇率的情况随时调整人民币价格，可联系客服咨询。',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}


	public function work()
	{
		$type = $this->global['type']['work'];
		$more = [
			'notice_img'     => 'c_tit_4.png',
			'notice_img_two' => 'c_tit_4_zh.png',
			'show_img'       => 'c_tab_4.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			华商长期和菲律宾50家以上的企业有业务往来，如果您需要找一个在菲律宾的工作，我们可以在10分钟内帮您搞定，最快当天办理入职入住。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '无限次往返菲律宾  工签是你最好的选择',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}

	public function business()
	{
		$type = $this->global['type']['business'];
		$more = [
			'notice_img'     => 'c_tit_7.png',
			'notice_img_two' => 'c_tit_7_zh.png',
			'show_img'       => 'c_tab_7.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			如果您初到菲律宾，对充值不熟？ 还是您在国内休假，无法给手机号码充值，现在无需出门，也无需发送繁琐的英文字母去包月或充值，华商一切给你搞定。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '注：会根据汇率的情况随时调整人民币价格，可联系客服咨询。',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}


	public function rePassport()
	{
		$type = $this->global['type']['rePassport'];
		$more = [
			'notice_img'     => 'c_tit_2.png',
			'notice_img_two' => 'c_tit_2_zh.png',
			'show_img'       => 'c_tab_2.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			旅游签到期后如需继续留在菲律宾，只需一个电话，我们上门取件，办理完毕后，上门送件。无需出门也可享受续签服务。如果您的签证过期未及时续签，也可以联系我们办理。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}

	public function news()
	{
		$type = $this->global['type']['news'];

		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'menu'     => $menu,
		]);
		return View::fetch();
	}


	public function content()
	{
		$param         = Request::param();
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		$content       = $ArticleModel->where('id','=',$param['id'])->find()->toArray();

		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'content'  => $content,
		]);
		return View::fetch();
	}


	public function blacklist()
	{
		$type = $this->global['type']['rePassport'];
		$more = [
			'notice_img'     => '',
			'notice_img_two' => 'black-form.png',
			'show_img'       => '',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			注：拉黑名单服务，需知道此人中文名称以及办理护照地址，方便我们泛查询（会有同名同姓）后给与您核对。 只有姓名无办理护照地址的情况则无法办理。
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}


	public function shipping()
	{
		$type = $this->global['type']['express'];
		$more = [
			'notice_img'     => 'c_tit_3.png',
			'notice_img_two' => 'c_tit_3_zh.png',
			'show_img'       => 'c_tab_3.png',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
        			需要邮寄东西到菲律宾，或者邮寄到中国。我们长期在中国厦门和中国泉州设立办事处，通过海运空运的方式邮寄到马尼拉，再免费送货到您的手中。（敏感物品需联系客服）
        		',
			'desc_one'		 => 'express1.png',
			'desc_two'		 => 'express2.png',
			'desc_three'     => 'express3.png',
			'tips'			 => '',

		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}

	public function jobs()
	{
		$type = $this->global['type']['rePassport'];
		$more = [
			'notice_img'     => '',
			'notice_img_two' => 'work.png',
			'show_img'       => '',
			'advert_img'     => 'advert.jpg',
			'subTxt'         => '
					最快十分钟帮您找到工作！
        		',
			'desc_one'		 => 'Certificates1.png',
			'desc_two'		 => 'Certificates2.png',
			'desc_three'     => 'Certificates3.png',
			'tips'			 => '',
		];
		$ArticleModel  = new \app\model\ArticleModel();
		$condition[]   = ['is_show','=',1];
		$condition[]   = ['category_id','=',$type];
		$CategoryModel = new \app\model\CategoryModel();
		$menu          = $CategoryModel->where('id','=',$type)->find()->toArray();
		$article       = $ArticleModel->where($condition)->field('id,title,desc,category_id,category_name,cover,create_time')->order('id','desc')->limit(20)->select()->toArray();
		View::assign([
			'article'  => $article,
			'config'   => $this->global['config'],
			'category' => $this->global['category'],
			'links'    => $this->global['links'],
			'more'     => $more,
			'menu'     => $menu,
		]);
		return View::fetch('visa');
	}
}
