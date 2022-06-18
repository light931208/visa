<?php
namespace app\controller;
use think\facade\View;

class Admin extends Common
{
    public function index()
    {
        return View::fetch();
    }
}