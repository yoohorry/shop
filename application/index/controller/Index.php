<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

use app\common\model\Category;
use app\common\model\City;
use app\common\model\Deal;
use app\common\model\Tuijianwei;

class Index extends Controller
{   
    /**
     * 首页展示
     */
    public function index($cityId = false)
    {   
        // 查询城市
        $cities = City::getIndexCities();
        // 将第一个被查询到的城市当作默认城市 存储它的主键id
        $defaultCity = $cityId ? $cityId : $cities[0]->id;
        // 将城市信息放进Session否则需要不停查询数据库的城市信息才能保证layout.html视图的城市信息有效
        Session::set('cities', $cities, 'index');
        // 设置默认城市
        Session::set('defaultCity', $defaultCity, 'index');

    /* 首页查询 */
        // 查询分类
        $cates = Category::getIndexCates();
        // 根据城市和分类获取本地5种热销商品
        $deals0 = Deal::getDealsByCityAndCate(Session::get('defaultCity', 'index'), $cates[0]->id);
        $deals1 = Deal::getDealsByCityAndCate(Session::get('defaultCity', 'index'), $cates[1]->id);
        $deals2 = Deal::getDealsByCityAndCate(Session::get('defaultCity', 'index'), $cates[2]->id);
        $deals3 = Deal::getDealsByCityAndCate(Session::get('defaultCity', 'index'), $cates[3]->id);
        $deals4 = Deal::getDealsByCityAndCate(Session::get('defaultCity', 'index'), $cates[4]->id);
        // 热销商品部分：获取本地所有热销商品
        $hotDeals = Deal::getDealsByCity(Session::get('defaultCity', 'index'));
        // 推荐位
        $tuijianwei  = Tuijianwei::select();
        // dump($tuijianwei[0]->image);die;

        return $this->fetch('', [
            // 默认城市和所有城市列表必须要有。因为layout.html布局模板需要
            'defaultCity' => Session::get('defaultCity', 'index'),
            'cities' => $cities,
            'cates' => $cates,
            'deals0' => $deals0,
            'deals1' => $deals1,
            'deals2' => $deals2,
            'deals3' => $deals3,
            'deals4' => $deals4,
            'hotDeals' => $hotDeals,
            'tjw' => $tuijianwei,
            'username' => Session::get('user', 'index')
        ]);
    }

    /**
     * 购物车
     */
    public function cart($cityId = false) {
        return $this->fetch('', [
            'defaultCity' => Session::get('defaultCity', 'index'),
            'cities' => Session::get('cities', 'index'),
            'username' => Session::get('user', 'index')
        ]);
    }

    /**
     * 商品详情
     */
    public function info($id) {
        if(empty($id)) {
            $this->error('无法正确获取商品信息');
        }

        $deal = Deal::find($id);
        if(!$deal) {
            $this->error('无法正确获取商品信息');
        }

        return $this->fetch('', [
            'defaultCity' => Session::get('defaultCity', 'index'),
            'cities' => Session::get('cities', 'index'),
            'deal' => $deal,
            'username' => Session::get('user', 'index')
        ]);
    }

    /**
     * 搜索方法
     */
    public function search() {
        $keyword = input('post.keyword');
        if(!$keyword) {
            $this->error('请输入搜索关键字');
        }

        // 实例化 Deal 模型
        $model = model('Deal');
        $deals = $model->doSearch($keyword);

        // dump($deals);die;

        return $this->fetch('list', [
            'defaultCity' => Session::get('defaultCity', 'index'),
            'cities' => Session::get('cities', 'index'),
            'deals' => $deals,
            'username' => Session::get('user', 'index') 
        ]);
    }
}
