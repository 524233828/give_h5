<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/25
 * Time: 15:33
 */

namespace Service\Goods;


use Model\AnalystLevelOrderModel;
use Model\OrderModel;
use Model\UserBillModel;
use Model\UserCateModel;
use Model\UserLevelOrderModel;

class Goods
{
    const USER_CATE = 1;

    public static $gateway = [
        self::USER_CATE => "userCate",
    ];

    public static function userCate($order_id)
    {
        $log = myLog("Goods_userCate");
        $log->addDebug("order_id:".$order_id);
        //更新用户等级购买表
        $user_cate_order = UserCateModel::getUserCateByOrderId($order_id);

        if($user_cate_order['type'] == 0){
            $end_time = time() + 7 * 86400;
        }else{
            $end_time = time() + 30 * 86400;
        }

        $result = UserCateModel::update(['status' => 1, 'end_time' => $end_time],["order_id" => $order_id]);
        $log->addDebug("result:".$result);

        return $result !== false;

    }

}