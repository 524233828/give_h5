<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/7/12
 * Time: 15:27
 */

namespace Controller\Admin;


use Logic\Admin\BannerLogic;

class BannerController extends AdminBaseController
{

    public function __construct()
    {
        $this->logic = BannerLogic::getInstance();

        $this->add_valid = [
            "image_url" => "url",
            "status" => "integer",
            "url" => "url",
            "sort" => "integer",
        ];
    }

}