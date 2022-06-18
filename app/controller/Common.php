<?php

namespace app\controller;

use app\BaseController;
use think\facade\Session;

class Common extends BaseController
{
    protected function initialize()
    {
       // 判断session完成标记是否存在
       if (!Session::get('admin_id')) {
            // 记住当前地址并重定向
            header("location:/Login");
        }
    }
}