<?php

namespace app\bis\controller;
use think\Session;

use app\common\model\Dealer;

class Index extends Base
{
    /**
     * 商户后台布局
     */
    public function index()
    {   
        $dealer = Dealer::find(Session::get('dealer_id', 'dealer'));
        return $this->fetch('', [
            'username' => $dealer->name,
        ]);
    }

    /**
     * 商户后台主页
     */
    public function home() 
    {   
        $dealer = Dealer::find(Session::get('dealer_id', 'dealer'));
        return $this->fetch('', [
            'dealer' => $dealer,
        ]);
    }

    /**
     * 商户地图
     */
    public function getMap($lng, $lat) {
        $center = $lng . ',' . $lat;
        return \Map::staticimage($center);
    }
}
