<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/2
 * Time: 18:49
 */

namespace Logic;


use Model\BannerModel;
use Model\UserModel;

class PayLogic extends BaseLogic
{

    public function userInfo()
    {
        $uid = UserLogic::$user['id'];

        return UserModel::getUserInfo($uid,["avatar"]);
    }

    public function banner()
    {
        $list =  BannerModel::fetch(
            [
                "image_url",
                "url",
            ],
            [
                "status" => 1,
                "ORDER" => ["sort" => "DESC"]
            ]
        );
        return ["list" => $list];
    }
}