<?php

namespace app\admin\controller;

class Index extends Base
{
    /**
     * 后台布局
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 后台首页
     */
    public function home() {
        return $this->fetch();
    }
}
