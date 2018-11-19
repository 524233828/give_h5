<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 22:11
 */

namespace Logic;


use Constant\ErrorCode;
use Model\AnalystRecommendModel;
use Model\CateModel;
use Model\RecommendModel;
use Model\UserAnalystModel;
use Model\UserCateModel;
use Service\Pager;

class AnalystRecommendLogic extends BaseLogic
{

//    public function cateImage($cate_id)
//    {
//        $cate = CateModel::get($cate_id, ["image_url"]);
//
//        if(empty($cate))
//        {
//            error(ErrorCode::CATE_NOT_FOUND);
//        }
//
//        return $cate;
//    }

    public function fetchRecommendByAnalyst($analyst_id, $page = 1, $size = 20)
    {
//        $pager = new Pager($page, $size);

        $where = ['analyst_id' => $analyst_id, "status" => 1, "end_time[>]" => time()];

        //计算符合筛选参数的行数
//        $count = RecommendModel::count($where);

        //分页
//        $where["LIMIT"] = [$pager->getFirstIndex(), $size];

        $where["ORDER"] = ["sort" => "DESC", "create_time" => "DESC"];

        $list = AnalystRecommendModel::fetch([
            AnalystRecommendModel::$table.".id",
            AnalystRecommendModel::$table.".title",
            AnalystRecommendModel::$table.".create_time",
            AnalystRecommendModel::$table.".update_time",
            AnalystRecommendModel::$table.".sort",
            AnalystRecommendModel::$table.".type",
        ],$where);

        $date_group_list = [];
        foreach($list as $value)
        {
            $key = date("Y-m-d", $value['create_time']);
            $value['create_time'] = date("Y-m-d H:i:s", $value['create_time']);
            $date_group_list[$key]["list"][] = $value;
            $date_group_list[$key]["date"] = $key;
        }

        $list = array_values($date_group_list);

        return [
            "list"=>$list,
//            "meta" => $pager->getPager($count)
        ];
    }

    public function recommendInfo($recommend_id)
    {
        $user_id = UserLogic::$user['id'];

        $recommend = AnalystRecommendModel::get($recommend_id);

        if(empty($recommend)){
            error(ErrorCode::RECOMMEND_NOT_FOUND);
        }

        if($recommend['end_time'] < time())
        {
            error(ErrorCode::RECOMMEND_EXPIRE);
        }

        //判断用户是否已购买
        if(UserAnalystModel::isExpired($user_id, $recommend['analyst_id'])){
            error(ErrorCode::CATE_NOT_BUY);
        }

        return $recommend;

    }
}