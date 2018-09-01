<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 15:41
 */

namespace Controller\Admin;


use Logic\Admin\CateLogic;

class CateController extends AdminBaseController
{
    public function __construct()
    {
        $this->logic = CateLogic::getInstance();

        $this->add_valid = [
            "image_url" => "url",
            "status" => "integer",
            "name" => "required",
            "week_amount" => "float",
            "month_amount" => "float",
        ];
    }
}