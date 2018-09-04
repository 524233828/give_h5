<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 15:30
 */

namespace Logic;


use Model\CateModel;
use Service\Pager;

class CateLogic extends BaseLogic
{

    public function cateList($page = 1, $size = 5)
    {
        $page = new Pager($page, $size);

        $where = ["status" => 1];

        $count = CateModel::count($where);

        $where['LIMIT'] = [$page->getFirstIndex(), $size];
        $where['ORDER'] = ["sort" => "DESC"];

        $list = CateModel::fetch(
            ["id","image_url", "week_amount", "month_amount","name"],
            $where
        );

        return ["list" => $list, "meta" => $page->getPager($count)];
    }
}