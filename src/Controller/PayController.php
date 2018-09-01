<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/2
 * Time: 18:48
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\PayLogic;

class PayController extends BaseController
{
    public function userInfo(ServerRequest $request)
    {
        return $this->response(PayLogic::getInstance()->userInfo());
    }

    public function banner(ServerRequest $request)
    {
        return $this->response(PayLogic::getInstance()->banner());
    }
}