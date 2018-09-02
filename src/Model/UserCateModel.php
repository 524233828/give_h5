<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/2
 * Time: 15:24
 */

namespace Model;


class UserCateModel extends BaseModel
{

    public static $table = "give_user_cate";

    public static function getUserCateByOrderId($order_id)
    {
        return database()->get(
            self::$table,
            "*",
            [
                "order_id" => $order_id
            ]
        );
    }

    public static function isExpired($user_id, $cate_id)
    {
        $end_time = database()->max(
            self::$table,
            ["end_time"],
            ["user_id"=>$user_id, "cate_id"=>$cate_id, "status" => 1 ]
        );

        if(empty($end_time)){
            return true;
        }

        return $end_time < time();
    }

}