<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use app\common\model\Bill as BillM;

class Bill extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $bills = BillM::getAllBillsAndPaginate();
        return $this->fetch('', [
            'bills' => $bills,
        ]);
    }

    
}
