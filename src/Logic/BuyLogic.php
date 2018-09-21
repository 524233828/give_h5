<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/25
 * Time: 15:45
 */

namespace Logic;


use Constant\ErrorCode;
use function EasyWeChat\Payment\get_client_ip;
use Model\CateModel;
use Model\OrderModel;
use Model\UserCateModel;
use Pay\Pay;
use Runner\NezhaCashier\Cashier;
use Runner\NezhaCashier\Utils\Amount;
use Service\Goods\Goods;
use Service\Pager;

class BuyLogic extends BaseLogic
{

    public function cate($cate_id, $buy_type = 0, $pay_type, $return_url = null)
    {
        if(empty($return_url)){
            $return_url = "http://give_h5.ym8800.com";
        }
        //判断用户是否已购买
        if(!UserCateModel::isExpired(UserLogic::$user['id'], $cate_id)){
            error(ErrorCode::USER_CATE_EXISTS);
        }

        //获取分类
        $cate = CateModel::get($cate_id);

        if(empty($cate))
        {
            error(ErrorCode::CATE_NOT_FOUND);
        }

        if($buy_type == 0){
            $amount = $cate['week_amount'];
            $info = "{$cate['name']}包周套餐";
        }else{
            $amount = $cate['month_amount'];
            $info = "{$cate['name']}包月套餐";
        }

        $order_id = OrderModel::getOrderId();

        $order = [
            "order_id" => $order_id,
            "amount" => Amount::dollarToCent($amount),
            "subject" => $info,
            'currency' => 'CNY',
            'description' => $info,
            'return_url' => $return_url,
        ];

        if($pay_type == "wechat_h5")
        {
            $order['user_ip'] = client_ip();
        }

        database()->pdo->beginTransaction();
        $order_data = [
            "order_id" => $order_id,
            "info" => $info,
            "total_fee" => $amount,
            "create_time" => time(),
            "product_id" => Goods::USER_CATE,
            "user_id" => UserLogic::$user['id'],
            "pay_type" => $pay_type
        ];

        $user_cate_data = [
            "order_id" => $order_id,
            "create_time" => time(),
            "user_id" => UserLogic::$user['id'],
            "cate_id" => $cate_id,
            "type" => $buy_type,
        ];

        $order_res = OrderModel::add($order_data);

        $user_cate_res = UserCateModel::add($user_cate_data);

        if($order_res&&$user_cate_res)
        {
            database()->pdo->commit();

        }else{
            database()->pdo->rollBack();
        }

        $res = $this->pay($pay_type, $order);

        if($res)
        {
            return $res;
        }else{
            error(ErrorCode::CREATE_ORDER_FAIL);
        }

    }

    private function pay($pay_type = "wechat", $order)
    {
        $config = config()->get("payment");
        $pay = new Cashier($pay_type, $config[$pay_type]);

        return $pay->charge($order)->get("charge_url");
    }

    public function fetchOrderList($page = 1, $size = 20)
    {

        $pager = new Pager($page, $size);
        $user_id = UserLogic::$user['id'];

        $where = ["user_id"=>$user_id, "status" => 1];

        $count = OrderModel::count($where);

        $where["LIMIT"] = [$pager->getFirstIndex(), $size];
        $where["ORDER"] = ["pay_time" => "DESC"];

        $order_list = OrderModel::fetch(["order_id","total_fee","info","pay_time"], $where);

        $order_ids = [];
        $order_index_list = [];
        foreach ($order_list as $k => $v)
        {
            $order_list[$k]['pay_time'] = date("Y-m-d H:i:s", $v['pay_time']);
            $order_ids[] = $v['order_id'];
            $order_index_list[$v["order_id"]] = $v;
        }

        //TODO：这里可以优化到Goods服务里面，但目前只有一种商品，暂时这样
        if(!empty($order_ids)){
            $cates = UserCateModel::fetch(["cate_id", "order_id", "end_time"],["order_id" => $order_ids]);
            foreach ($cates as $cate){
                $order_index_list[$cate['order_id']]['cate_id'] = $cate['cate_id'];
                $order_index_list[$cate['order_id']]['end_time'] = date("Y-m-d H:i:s",$cate['end_time']);
            }
        }



        $order_list = array_values($order_index_list);

        return ["list" => $order_list, "meta" => $pager->getPager($count)];
    }

    public function catePrice($cate_id)
    {
        $cate = CateModel::get($cate_id,["id","name", "week_amount", "month_amount"]);

        if(empty($cate))
        {
            error(ErrorCode::CATE_NOT_FOUND);
        }

        $user = UserLogic::$user;

        if(empty($user))
        {
            $cate['is_buy'] = 0;
        }else{
            if(UserCateModel::isExpired($user['id'], $cate_id)){
                $cate['is_buy'] = 0;
            }else{
                $cate['is_buy'] = 1;
            }
        }

        return $cate;
    }
}