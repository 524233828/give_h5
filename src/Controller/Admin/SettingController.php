<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/7/12
 * Time: 15:27
 */

namespace Controller\Admin;


use Logic\Admin\SettingLogic;

class SettingController extends AdminBaseController
{

    public function __construct()
    {
        $this->logic = SettingLogic::getInstance();

        $this->add_valid = [
            "name" => "required",
            "value" => "required",
            "desc" => "null",
        ];
    }

}