<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/7/12
 * Time: 15:27
 */

namespace Controller\Admin;

use Logic\Admin\AnalystLogic;

class AnalystController extends AdminBaseController
{

    public function __construct()
    {
        $this->logic = AnalystLogic::getInstance();

        $this->add_valid = [
            "nickname" => "required",
            "avatar" => "url",
            "tag" => "null",
            "information" => "null",
            "status" => "integer",
            "sort" => "integer",
            "season_amount" => "float",
            "month_amount" => "float",
            "week_amount" => "float",
            "image_url" => "url",
        ];
    }

}