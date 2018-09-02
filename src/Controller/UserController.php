<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/2
 * Time: 17:21
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\UserLogic;

class UserController extends BaseController
{
    public function getUserInfo(ServerRequest $request)
    {
        return $this->response(UserLogic::getInstance()->getUserInfo());
    }
}