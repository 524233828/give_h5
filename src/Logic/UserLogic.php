<?php

namespace Logic;

use Constant\ErrorCode;
use Model\UserModel;

class UserLogic extends BaseLogic
{

    static public $user;

    public function getUserInfo()
    {
        $uid = UserLogic::$user['id'];

        $info = UserModel::getUserInfo($uid,['username','avatar']);

        if(!$info){
            error(ErrorCode::USER_NOT_FOUND);
        }

        return $info;
    }
}
