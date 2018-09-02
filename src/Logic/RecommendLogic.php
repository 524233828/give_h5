<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 22:11
 */

namespace Logic;


use Constant\ErrorCode;
use Model\CateModel;
use Model\RecommendModel;
use Model\UserCateModel;
use Service\Pager;

class RecommendLogic extends BaseLogic
{

    public function cateImage($cate_id)
    {
        $cate = CateModel::get($cate_id, ["image_url"]);

        if(empty($cate))
        {
            error(ErrorCode::CATE_NOT_FOUND);
        }

        return $cate;
    }

    public function fetchRecommendByCate($cate_id, $page = 1, $size = 20)
    {
        $pager = new Pager($page, $size);

        $where = ['cate_id' => $cate_id, "status" => 1];

        //计算符合筛选参数的行数
        $count = RecommendModel::count($where);

        //分页
        $where["LIMIT"] = [$pager->getFirstIndex(), $size];

        $where["ORDER"] = ["sort" => "DESC"];

        $list = RecommendModel::fetch([
            RecommendModel::$table.".id",
            RecommendModel::$table.".title",
            RecommendModel::$table.".update_time",
            RecommendModel::$table.".sort",
        ],$where);

        return ["list"=>$list, "meta" => $pager->getPager($count)];
    }

    public function recommendInfo($recommend_id)
    {
        $user_id = UserLogic::$user['id'];

        $recommend = RecommendModel::get($recommend_id);

        if(empty($recommend)){
            error(ErrorCode::RECOMMEND_NOT_FOUND);
        }

        //判断用户是否已购买
        if(UserCateModel::isExpired($user_id, $recommend['cate_id'])){
            error(ErrorCode::CATE_NOT_BUY);
        }

        return $recommend;

    }
}