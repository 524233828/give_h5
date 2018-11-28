<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 16:53
 */

namespace Controller\Admin;


use Logic\Admin\AnalystRecommendLogic;

class AnalystRecommendController extends AdminBaseController
{
    public function __construct()
    {
        $this->logic = AnalystRecommendLogic::getInstance();

        $this->add_valid = [
            "title" => "null",
            "image_url" => "null",
            "content" => "null",
            "sort" => "integer",
            "status" => "integer",
            "analyst_id" => "integer",
            "end_time" => "integer",
            "type" => "integer|in:0,1,2",
        ];
    }
}