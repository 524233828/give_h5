<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/7/29
 * Time: 16:42
 */

namespace Logic\Admin;

use Logic\BaseLogic;
use Model\OrderModel;

class IncomeStaticLogic extends BaseLogic
{

    private $format = [
        "year" => "%Y",
        "month" => "%Y-%m",
        "day" => "%Y-%m-%d",
        "hour" => "%Y-%m-%d %H",
        "minute" => "%Y-%m-%d %H-%i",
    ];

    public function incomeStatic($start_date = null, $end_date = null, $format = "month")
    {
        if(empty($end_date))
        {
            $end_date = date("Ymd", time());
        }

        if(empty($start_date))
        {
            $start_date = date("Ymd", time()-31536000);
        }

        $start_time = strtotime($start_date);
        $end_time = strtotime($end_date . "+1 day");
        
        if(isset($this->format[$format]))
        {
            $format = $this->format[$format];
        }else{
            $format = $this->format['month'];
        }

        $result = [];

        $result['sum'] = OrderModel::incomeStaticSum();

        $result['list'] = OrderModel::dailyIncome($start_time, $end_time, $format);

        return $result;
    }

    public function channelReport($start_date = null, $end_date = null, $channel = null)
    {
        //开始日期为空，开始日期设为前一天
        if(empty($start_date))
        {
            $start_date = date("Ymd", time() - 86400);
        }
        //结束日期为空，结束日期设为开始日期
        if(empty($end_date))
        {
            $end_date = $start_date;
        }

        $start_time = strtotime($start_date);
        $end_time = strtotime($end_date. "+1 day");

        $order_count = OrderModel::countChannelOrder($start_time, $end_time, $channel);
        $pay = OrderModel::countChannelPay($start_time, $end_time, $channel);

        $channel_index_order_count = [];
        foreach ($order_count as $key => $item)
        {
            $channel_index_order_count[$item['channel']] = $item;
        }

        foreach ($pay as $key => $value){
            if(isset($channel_index_order_count[$value['channel']])){
                $pay[$key]['order_count'] = $channel_index_order_count[$value['channel']]['order_count'];
            }
        }

        return $pay;
    }
}