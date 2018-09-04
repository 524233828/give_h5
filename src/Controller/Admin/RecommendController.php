<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 16:53
 */

namespace Controller\Admin;


use Logic\Admin\RecommendLogic;

class RecommendController extends AdminBaseController
{
    public function __construct()
    {
        $this->logic = RecommendLogic::getInstance();

        $this->add_valid = [
            "title" => "null",
            "image_url" => "url",
            "content" => "null",
            "sort" => "integer",
            "status" => "integer",
            "cate_id" => "integer",
            "end_time" => "integer",
        ];
    }
}