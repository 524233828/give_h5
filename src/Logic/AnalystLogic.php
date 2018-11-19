<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 15:30
 */

namespace Logic;


use Model\AnalystModel;
use Service\Pager;

class AnalystLogic extends BaseLogic
{

    public function analystList($page = 1, $size = 5)
    {
        $page = new Pager($page, $size);

        $where = ["status" => 1];

        $count = AnalystModel::count($where);

        $where['LIMIT'] = [$page->getFirstIndex(), $size];
        $where['ORDER'] = ["sort" => "DESC"];

        $list = AnalystModel::fetch(
            ["id","nickname", "week_amount", "month_amount", "season_amount", "tag", "avatar", "information"],
            $where
        );

        return ["list" => $list, "meta" => $page->getPager($count)];
    }
}