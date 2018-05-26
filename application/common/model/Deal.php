<?php

namespace app\common\model;

use think\Model;

class Deal extends Model
{
    public static function getAllDealsAndPaginate($status, $dealer_id) {
        $where = [
            'dealer_id' => $dealer_id,
            'status' => $status
        ];
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
        ];

        return Self::where($where)->order($order)->paginate(5);
    }

    public static function getAllDealsAndPaginateAdmin($status) {
        $where = [
            'status' => $status
        ];
        $order = [
            'update_time' => 'desc',
            'create_time' => 'desc',
        ];

        return Self::where($where)->order($order)->paginate(5);
    }

    /**
     * 根据城市分类和分类获取热销商品
     */
    public static function getDealsByCityAndCate($defaultCity, $cateId) {
        $where = [
            'status' => 1,
            'city_id' => $defaultCity,
            'category_id' => $cateId,
        ];
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
        ];
        // 获取20个商品最多
        return Self::where($where)->order($order)->limit(20)->select();
    }

    /**
     * 获取本地热销商品
     */
    public static function getDealsByCity($defaultCity) {
        $where = [
            'city_id' => $defaultCity,
            'status' => 1,
        ];
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
        ];
        // 获取20个商品最多
        return Self::where($where)->order($order)->limit(6)->select();
    }

    /**
     * 计算商品总价
     */
    public static function totalPrice($ids, $numbers) {
        $totalPrice = 0.00;
        
        for($i=0; $i<count($ids); $i++) {
            $dealInfo = Self::where('id', $ids[$i])->find();
            $totalPrice += $dealInfo->selling_price * $numbers[$i];
        }

        return $totalPrice;
    }

    /**
     * 搜索关键字
     */
    public function doSearch($keyword) {
        $where = [
            'status' => 1,
            'name' => ['like', $keyword],
        ];
        $order = [
            'listorder' => 'desc',
        ];

        return $this->where($where)->order($order)->paginate(5);
    }
}
