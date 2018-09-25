<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/26
 * Time: 16:58
 */

namespace Model;


class OrderModel extends BaseModel
{

    public static $table = "give_order";

    public static function getOrderId()
    {
        $order_id = microtime(true)*10000;
        return "{$order_id}";
    }

    public static function getOrderByOrderId($order_id, $columns = "*")
    {
        return database()->get(self::$table, $columns, ["order_id" => $order_id]);
    }

    public static function incomeStaticSum()
    {
        return database()->sum(self::$table,"settlement_total_fee",["status[>]"=>0]);
    }

    public static function dailyIncome($start_time,$end_time, $format = "%Y-%m")
    {
        if($start_time>$end_time)
        {
            return [];
        }

        $table = self::$table;

        $sql = <<<SQL
SELECT 
  FROM_UNIXTIME(pay_time,'{$format}') as pay_date,
  sum(settlement_total_fee) as income
FROM `{$table}`
WHERE 
  `status`>0 
AND
  pay_time>={$start_time}
AND
  pay_time<{$end_time}
GROUP BY pay_date
SQL;
        return database()->query($sql)->fetchAll();

    }

    /**
     * 下单量
     * @param $start_time
     * @param $end_time
     * @param array|null $channel
     * @return array
     */
    public static function countChannelOrder($start_time, $end_time, array $channel = null)
    {
        $table = self::$table;

        $where = "`create_time`>={$start_time} and `create_time`<{$end_time}";

        if(!empty($channel)){
            $channel = implode("','", $channel);
            $where .= "and channel IN ('$channel')";
        }

        $sql = <<<SQL
SELECT count(*) as order_count, channel FROM `{$table}` WHERE {$where} GROUP BY `channel`
SQL;

        return database()->query($sql)->fetchAll();
    }

    /**
     * @param $start_time
     * @param $end_time
     * @param array|null $channel
     * @return array
     */
    public static function countChannelPay($start_time, $end_time, array $channel = null)
    {
        $table = self::$table;

        $where = "`create_time`>={$start_time} and `create_time`<{$end_time} and status=1";

        if(!empty($channel)){
            $channel = implode("','", $channel);
            $where .= "and channel IN ('$channel')";
        }

        $sql = <<<SQL
SELECT count(*) as pay_count, sum(`total_fee`) as pay_sum, channel FROM `{$table}` WHERE {$where} GROUP BY `channel`
SQL;

        return database()->query($sql)->fetchAll();
    }
}